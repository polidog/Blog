<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Account;

/**
 * Class RegisterSpecification.
 */
class RegisterSpecification
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function isSatisfiedBy(User $user)
    {
        $user = $this->userRepository->findEmail($user->email());

        return empty($user);
    }
}
