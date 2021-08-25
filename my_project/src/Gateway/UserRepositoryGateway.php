<?php

namespace App\Gateway;

use App\Entity\User;

/**
 * Interface UserRepositoryGateway
 * @package App\Gateway
 */
interface UserRepositoryGateway extends AbstractRepositoryGateway
{
    /**
     * @param User $user
     */
    public function save(User $user): void;

    public function update(): void;
}
