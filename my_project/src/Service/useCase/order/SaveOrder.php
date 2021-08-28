<?php

namespace App\Service\useCase\order;

use App\Dto\order\OrderDto;
use App\Entity\Item;
use App\Entity\Order;
use App\Gateway\OrderRepositoryGateway;

/**
 * Class SaveOrder
 * @package App\Service\useCase\order
 */
class SaveOrder
{
    /**
     * SaveOrder constructor.
     * @param OrderRepositoryGateway $orderRepositoryGateway
     */
    public function __construct(
        private OrderRepositoryGateway $orderRepositoryGateway
    ) {
    }

    /**
     * @param OrderDto $orderDto
     */
    public function execute(OrderDto $orderDto): void
    {
        $order = new Order();
        $order->setStatus($orderDto->getStatus());
        $order->setOrderDate($orderDto->getOrderDate());
        $order->setCustomer($orderDto->getCustomer());
        //$itemsToSave = array();
        $price = 0;
        /** @var Item $item */
        foreach ($orderDto->getItems() as $item) {
            $price += $item->getProduct()->getPrice() * $item->getQuantity();
            $it = new Item();
            $it->setProduct($item->getProduct());
            $it->setQuantity($item->getQuantity());
            $it->setOrderItem($order);
            $order->addItem($it);
        }
        $order->setPrice($orderDto->getPrice() ? $orderDto->getPrice() : $price);
        $this->orderRepositoryGateway->save($order);
    }
}
