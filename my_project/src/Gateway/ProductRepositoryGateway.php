<?php

namespace App\Gateway;

use App\Entity\Product;

/**
 * Interface UserRepositoryGateway
 * @package App\Gateway
 */
interface ProductRepositoryGateway extends AbstractRepositoryGateway
{
    /**
     * @param Product $product
     */
    public function save(Product $product): void;

    public function update(): void;
}
