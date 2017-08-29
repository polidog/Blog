<?php
namespace Polidog\Blog\Model\Account;

/**
 * Class RegisterSpecification
 * @package vendor\polidog\blog\src\Model\Account
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
     * @return bool
     */
    public function isSatisfiedBy(User $user)
    {
        $user = $this->userRepository->findEmail($user->getEmail());
        return !$user instanceof User;
    }

}
