<?php
namespace App\Dto\item;

use App\Entity\Order;
use App\Entity\Product;

class ItemDto
{
    /**
     * ItemDto constructor.
     * @param int|null $id
     * @param Product|null $product
     * @param int|null $quantity
     * @param Order|null $orderItem
     */
    public function __construct(
        private ?int $id,
        private ?Product $product,
        private ?int $quantity,
        private ?Order $orderItem
    ) {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ItemDto
     */
    public function setId(?int $id): ItemDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ItemDto
     */
    public function setProduct(?Product $product): ItemDto
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return ItemDto
     */
    public function setQuantity(?int $quantity): ItemDto
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Order|null
     */
    public function getOrderItem(): ?Order
    {
        return $this->orderItem;
    }

    /**
     * @param Order|null $orderItem
     * @return ItemDto
     */
    public function setOrderItem(?Order $orderItem): ItemDto
    {
        $this->orderItem = $orderItem;
        return $this;
    }
}
