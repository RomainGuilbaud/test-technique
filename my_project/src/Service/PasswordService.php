<?php

namespace App\Service;

use App\Entity\User;
use App\Gateway\UserRepositoryGateway;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordService
{
    public function __construct(
        private  UserPasswordHasherInterface $hasher,
        private UserRepositoryGateway $userRepositoryGateway
    ) {
    }

    public function HashPasswordUser(): void
    {
        $users = $this->userRepositoryGateway->findAll();
        /** @var User $user */
        foreach ($users as $user) {
            $passwordHashed = $this->hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($passwordHashed);
        }
        $this->userRepositoryGateway->update();
    }
}
