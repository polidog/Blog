<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Model\Account\Credential;
use Polidog\Blog\Model\Account\PasswordEncoderInterface;
use Polidog\Blog\Model\Account\UserRepository;

class Authentication
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var PasswordEncoderInterface
     */
    private $encoder;

    /**
     * @param UserRepository           $userRepository
     * @param PasswordEncoderInterface $encoder
     */
    public function __construct(UserRepository $userRepository, PasswordEncoderInterface $encoder)
    {
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;
    }


    public function run(string $email, string $password)
    {
        $user = $this->userRepository->findEmail($email);
        return $user->authentication($this->encoder, $password);
    }


}
