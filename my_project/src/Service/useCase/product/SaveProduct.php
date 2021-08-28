<?php

namespace App\Service\useCase\product;

use App\Entity\Product;
use App\Gateway\ProductRepositoryGateway;

/**
 * Class SaveProduct
 * @package App\Service\useCase\product
 */
class SaveProduct
{
    /**
     * SaveProduct constructor.
     * @param ProductRepositoryGateway $productRepositoryGateway
     */
    public function __construct(
        private ProductRepositoryGateway $productRepositoryGateway
    ) {
    }

    /**
     * @param Product $product
     */
    public function execute(Product $product): void
    {
        $this->productRepositoryGateway->save($product);
    }
}
