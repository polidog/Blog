<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Account;

class User
{
    /**
     * @var int
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
        return (int) $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->credential->email();
    }

    public function password(): string
    {
        return $this->credential->password();
    }

    public function encodePassword(PasswordEncoderInterface $encoder): void
    {
        $this->credential->encodePassword($encoder);
    }

    public function authentication(PasswordEncoderInterface $encoder, string $plainPassword): bool
    {
        return $this->credential->isPasswordValid($encoder, $plainPassword);
    }
}
