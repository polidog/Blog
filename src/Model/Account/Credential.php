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
     * @var string
     */
    private $salt;

    /**
     * @param string $email
     * @param string $password
     * @param string $salt
     */
    public function __construct(string $email, string $password, string $salt = "")
    {
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
    }

    /**
     * @param string $email
     * @param string $password
     * @return Credential
     */
    public static function newCredential(string $email, string $password)
    {
        return new self($email, $password, md5(random_bytes(128)));
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

    public function salt(): string
    {
        return $this->salt;
    }

    /**
     * @param PasswordEncoderInterface $encoder
     */
    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        $this->password = $encoder->encodePassword($this->password, $this->salt);
    }

    /**
     * @param PasswordEncoderInterface $encoder
     * @param string                   $plainPassword
     * @return bool
     */
    public function isPasswordValid(PasswordEncoderInterface $encoder, string $plainPassword)
    {
        return $encoder->isPasswordValid($this->password, $plainPassword, $this->salt);
    }

}
