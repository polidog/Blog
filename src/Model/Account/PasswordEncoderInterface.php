<?php

namespace Polidog\Blog\Model\Account;


interface PasswordEncoderInterface
{
    /**
     * @param string $password
     * @param string $salt
     * @return mixed
     */
    public function encodePassword(string $password, string $salt);


    /**
     * Checks a raw password against an encoded password.
     *
     * @param string $encoded An encoded password
     * @param string $raw     A raw password
     * @param string $salt    The salt
     *
     * @return bool true if the password is valid, false otherwise
     */
    public function isPasswordValid($encoded, $raw, $salt);
}
