<?php


namespace Polidog\Blog\Model\Account;


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetter()
    {
        $name = "test1";
        $email = "test@test.com";
        $password = "password";
        $user = new User($name, new Credential($email, $password));

        $this->assertEquals($name, $user->name());
        $this->assertEquals($email, $user->email());
        $this->assertEquals($password, $user->password());

    }

    public function testEncodePassword()
    {
        $encoder = $this->getEncoder();
        $credential = $this->prophesize(Credential::class);
        $user = new User("test1", $credential->reveal());
        $user->encodePassword($encoder);


        $credential->encodePassword($encoder)
            ->shouldHaveBeenCalled();

    }

    public function testAuthentication()
    {
        $plainPassword = "plain password";

        $encoder = $this->getEncoder();
        $credential = $this->prophesize(Credential::class);
        $credential->isPasswordValid($encoder, $plainPassword)->willReturn(true);

        $user = new User("test1", $credential->reveal());
        $user->authentication($encoder, $plainPassword);

        $credential->isPasswordValid($encoder, $plainPassword)
            ->shouldHaveBeenCalled();

    }

    private function getEncoder()
    {
        return new class implements PasswordEncoderInterface {
            public function encodePassword(string $password, string $salt)
            {
                // TODO: Implement encodePassword() method.
            }

            public function isPasswordValid($encoded, $raw, $salt)
            {
                // TODO: Implement isPasswordValid() method.
            }

        };
    }
}

