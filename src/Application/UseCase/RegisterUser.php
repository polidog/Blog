<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Application\TransactionManager;
use Polidog\Blog\Model\Account\DuplicateEmailException;
use Polidog\Blog\Model\Account\PasswordEncoderInterface;
use Polidog\Blog\Model\Account\RegisterSpecification;
use Polidog\Blog\Model\Account\User;
use Polidog\Blog\Model\Account\UserRepository;
use vendor\polidog\blog\src\Model\Account\Credential;

class RegisterUser
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var RegisterSpecification
     */
    private $specification;

    /**
     * @var TransactionManager
     */
    private $transactionManager;

    /**
     * @var PasswordEncoderInterface
     */
    private $encoder;

    /**
     * @param UserRepository           $userRepository
     * @param RegisterSpecification    $specification
     * @param TransactionManager       $transactionManager
     * @param PasswordEncoderInterface $encoder
     */
    public function __construct(UserRepository $userRepository, RegisterSpecification $specification, TransactionManager $transactionManager, PasswordEncoderInterface $encoder)
    {
        $this->userRepository = $userRepository;
        $this->specification = $specification;
        $this->transactionManager = $transactionManager;
        $this->encoder = $encoder;
    }


    public function run(string $name, string $email, string $password)
    {
        $user = new User($name, Credential::newCredential($email, $password));
        $user->encodePassword($this->encoder);

        if (false === $this->specification->isSatisfiedBy($user)) {
            throw new DuplicateEmailException();
        }

        $this->transactionManager->begin();
        try {
            // TODO password hash
            $this->userRepository->create($user);
            $this->transactionManager->commit();
        } catch (\Exception $e) {
            $this->transactionManager->rollback();
            throw $e;
        }

        return $user->id();
    }

}
