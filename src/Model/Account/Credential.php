<?php
namespace Polidog\Blog\Model\Account;


class Credential
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;


    /**
     * @param string $email
     * @param string $password
     * @param string $salt
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @param string $email
     * @param string $password
     * @return Credential
     */
    public static function newCredential(string $email, string $password)
    {
        return new self($email, $password);
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    /**
     * @param PasswordEncoderInterface $encoder
     */
    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        $this->password = $encoder->encodePassword($this->password, "");
    }

    /**
     * @param PasswordEncoderInterface $encoder
     * @param string                   $plainPassword
     * @return bool
     */
    public function isPasswordValid(PasswordEncoderInterface $encoder, string $plainPassword)
    {
        return $encoder->isPasswordValid($this->password, $plainPassword, "");
    }

}
