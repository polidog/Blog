<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Application\TransactionManager;
use Polidog\Blog\Model\Account\DuplicateEmailException;
use Polidog\Blog\Model\Account\RegisterSpecification;
use Polidog\Blog\Model\Account\User;
use Polidog\Blog\Model\Account\UserRepository;

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
     * @param UserRepository        $userRepository
     * @param RegisterSpecification $specification
     * @param TransactionManager    $transactionManager
     */
    public function __construct(UserRepository $userRepository, RegisterSpecification $specification, TransactionManager $transactionManager)
    {
        $this->userRepository = $userRepository;
        $this->specification = $specification;
        $this->transactionManager = $transactionManager;
    }

    public function run(string $name, string $email, string $password)
    {
        $user = new User($name, $email, $password);
        if ($this->specification->isSatisfiedBy($user)) {
            throw new DuplicateEmailException();
        }

        $this->transactionManager->begin();
        try {
            $this->userRepository->store($user);
            $this->transactionManager->commit();
        } catch (\Exception $e) {
            $this->transactionManager->rollback();
            throw $e;
        }

        return $user->getId();
    }

}
