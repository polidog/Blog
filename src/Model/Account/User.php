<?php
namespace Polidog\Blog\Model\Account;

class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Credential
     */
    private $credential;

    public function __construct(string $name, Credential $credential)
    {
        $this->name = $name;
        $this->credential = $credential;
    }

    public function id(): int
    {
        return (int)$this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->credential->email();
    }

    public function password()
    {
        return $this->credential->password();
    }

    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        $this->credential->encodePassword($encoder);
    }

    public function authentication(PasswordEncoderInterface $encoder, string $plainPassword): bool
    {
        return $this->credential->isPasswordValid($encoder, $plainPassword);
    }

}
