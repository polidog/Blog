<?php

namespace Polidog\Blog\Model\Account;


interface PasswordEncoderInterface
{
    public function encodePassword(string $password, string $salt);
}
