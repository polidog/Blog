<?php


namespace Polidog\Blog\Model\Account;


use PHPUnit\Framework\TestCase;

class RegisterSpecificationTest extends TestCase
{
    public function testIsSatisfiedBy()
    {
        $email = "test@test.com";
        $user = new User("user1", new Credential($email, "password"));

        $userRepository = $this->prophesize(UserRepository::class);
        $userRepository->findEmail($email)
            ->willReturn(null);

        $spec = new RegisterSpecification($userRepository->reveal());
        $spec->isSatisfiedBy($user);

        $userRepository->findEmail($email)
            ->shouldHaveBeenCalled();
    }
}
