<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Account;

interface UserRepository
{
    /**
     * @param string $email
     *
     * @return User
     */
    public function findEmail(string $email);

    /**
     * @param User $user
     */
    public function create(User $user): void;
}
