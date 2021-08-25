<?php

namespace App\Gateway;

use App\Entity\Order;

/**
 * Interface UserRepositoryGateway
 * @package App\Gateway
 */
interface OrderRepositoryGateway extends AbstractRepositoryGateway
{
    /**
     * @param Order $order
     */
    public function save(Order $order): void;

    public function update(): void;
}
