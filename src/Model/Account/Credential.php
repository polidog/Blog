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
        return new self($email, $password);
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    public function createSalt()
    {
        $this->salt = md5(random_bytes(128));
    }

    /**
     * @param PasswordEncoderInterface $encoder
     */
    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        if (empty($this->salt)) {
            $this->createSalt();
        }
        $this->password = $encoder->encodePassword($this->password, $this->salt);
    }

    /**
     * @param Credential $credential
     * @return bool
     */
    public function equals(Credential $credential)
    {
        return $credential->email() === $this->email && $credential->password() === $this->password;
    }
}
