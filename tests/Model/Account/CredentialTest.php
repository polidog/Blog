<?php


namespace Polidog\Blog\Model\Account;


use PHPUnit\Framework\TestCase;

class CredentialTest extends TestCase
{
    public function testNewCredential()
    {
        $email = "test@test.com";
        $password = "password";

        $credential = Credential::newCredential($email, $password);
        $this->assertEquals($password, $credential->password());
        $this->assertEquals($email, $credential->email());
    }

    public function testEncodePassword()
    {
        $email = "test@test.com";
        $password = "password";

        $credential = Credential::newCredential($email, $password);

        $encoder = $this->prophesize(PasswordEncoderInterface::class);
        $encoder->encodePassword($password, "")
            ->willReturn("hashed password");

        $credential->encodePassword($encoder->reveal());

        $encoder->encodePassword($password, "")
            ->shouldHaveBeenCalled();
    }

    public function testIsPasswordValid()
    {
        $email = "test@test.com";
        $password = "password";

        $plainPassword = "plainPassword";

        $credential = Credential::newCredential($email, $password);
        $encoder = $this->prophesize(PasswordEncoderInterface::class);
        $encoder->isPasswordValid($password, $plainPassword, "")
            ->willReturn(false);

        $credential->isPasswordValid($encoder->reveal(), $plainPassword);

        $encoder->isPasswordValid($password, $plainPassword, "")
            ->shouldHaveBeenCalled();

    }
}
