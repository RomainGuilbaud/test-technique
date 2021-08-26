<?php

namespace App\Service\useCase\item;

use App\Entity\Product;
use App\Gateway\ProductRepositoryGateway;

class SaveProduct
{
    public function __construct(
        private ProductRepositoryGateway $productRepositoryGateway
    ) {
    }

    public function execute(Product $product): void
    {
        $this->productRepositoryGateway->save($product);
    }
}
