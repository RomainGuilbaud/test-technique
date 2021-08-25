<?php

namespace App\Gateway;

use App\Entity\Item;

/**
 * Interface UserRepositoryGateway
 * @package App\Gateway
 */
interface ItemRepositoryGateway extends AbstractRepositoryGateway
{
    /**
     * @param Item $item
     */
    public function save(Item $item): void;

    public function update(): void;
}
