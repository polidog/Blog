<?php
namespace Polidog\Blog\Model\Account;


use vendor\polidog\blog\src\Model\Account\Credential;

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

    public function credential(): Credential
    {
        return $this->credential;
    }

    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        $this->credential->encodePassword($encoder);
    }

    public function authentication(Credential $credential): bool
    {
        return $this->credential->equals($credential);
    }

}
