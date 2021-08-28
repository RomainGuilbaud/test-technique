<?php

namespace App\Service\useCase\user;

use App\Entity\User;
use App\Gateway\UserRepositoryGateway;

/**
 * Class SaveUser
 * @package App\Service\useCase\user
 */
class SaveUser
{
    /**
     * SaveUser constructor.
     * @param UserRepositoryGateway $userRepositoryGateway
     */
    public function __construct(
        private UserRepositoryGateway $userRepositoryGateway
    ) {
    }

    /**
     * @param User $user
     */
    public function execute(User $user): void
    {
        $this->userRepositoryGateway->save($user);
    }
}
