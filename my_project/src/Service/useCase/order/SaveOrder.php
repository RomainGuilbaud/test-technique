<?php

namespace App\Service\useCase\item;

use App\Entity\Order;
use App\Gateway\OrderRepositoryGateway;

class SaveOrder
{
    public function __construct(
        private OrderRepositoryGateway $orderRepositoryGateway
    ) {
    }

    public function execute(Order $order): void
    {
        $this->orderRepositoryGateway->save($order);
    }
}
