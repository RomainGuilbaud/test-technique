<?php

namespace App\Service\useCase\item;

use App\Entity\Item;
use App\Gateway\ItemRepositoryGateway;

class SaveItem
{
    public function __construct(
        private ItemRepositoryGateway $itemRepositoryGateway
    ) {
    }

    public function execute(Item $item): void
    {
        $this->itemRepositoryGateway->save($item);
    }
}
