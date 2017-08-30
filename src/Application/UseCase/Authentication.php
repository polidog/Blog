<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Model\Account\UserRepository;
use vendor\polidog\blog\src\Model\Account\Credential;

class Authentication
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function run(string $email, string $password, string $salt)
    {
        $user = $this->userRepository->findEmail($email);
        $credential = new Credential($email, $password, $salt);
        return $user->authentication($credential);
    }
}
