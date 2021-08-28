<?php

namespace App\Service\useCase\item;

use App\Entity\Item;
use App\Gateway\ItemRepositoryGateway;

/**
 * Class SaveItem
 * @package App\Service\useCase\item
 */
class SaveItem
{
    /**
     * SaveItem constructor.
     * @param ItemRepositoryGateway $itemRepositoryGateway
     */
    public function __construct(
        private ItemRepositoryGateway $itemRepositoryGateway
    ) {
    }

    /**
     * @param Item $item
     */
    public function execute(Item $item): void
    {
        $this->itemRepositoryGateway->save($item);
    }
}
