<?php

namespace App\Service\useCase\item;

use App\Entity\User;
use App\Gateway\UserRepositoryGateway;

class SaveUser
{
    public function __construct(
        private UserRepositoryGateway $userRepositoryGateway
    ) {
    }

    public function execute(User $user): void
    {
        $this->userRepositoryGateway->save($user);
    }
}
