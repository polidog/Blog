<?php
namespace Polidog\Blog\Model\Account;


interface UserRepository
{
    /**
     * @param string $email
     * @return User
     */
    public function findEmail(string $email);

    /**
     * @param User $user
     * @return void
     */
    public function store(User $user);
}
