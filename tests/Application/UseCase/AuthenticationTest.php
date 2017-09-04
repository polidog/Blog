<?php


namespace Polidog\Blog\Application\UseCase;


use PHPUnit\Framework\TestCase;
use Polidog\Blog\Model\Account\PasswordEncoderInterface;
use Polidog\Blog\Model\Account\User;
use Polidog\Blog\Model\Account\UserRepository;

class AuthenticationTest extends TestCase
{
    public function testRun()
    {
        $email = "test@test.com";
        $password = "password";

        $userRepository = $this->prophesize(UserRepository::class);
        $encoder = $this->prophesize(PasswordEncoderInterface::class);
        $user = $this->prophesize(User::class);

        $userRepository->findEmail($email)
            ->willReturn($user);

        $user->authentication($encoder, $password)
            ->willReturn(true);

        $authentication = new Authentication($userRepository->reveal(), $encoder->reveal());
        $authentication->run($email, $password);

        $userRepository->findEmail($email)
            ->shouldHaveBeenCalled();

        $user->authentication($encoder, $password)
            ->shouldHaveBeenCalled();




    }
}
