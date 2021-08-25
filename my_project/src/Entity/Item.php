<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups' => ['item:read']]
)]
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"item:read", "order:read"})
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @Groups({"item:read"})
     */
    private ?Product $product;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"item:read"})
     */
    private ?int $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="items")
     * @Groups({"item:read"})
     */
    private ?Order $orderItem;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return $this
     */
    public function setProduct(?Product $product): self
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
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity): self
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
     * @return $this
     */
    public function setOrderItem(?Order $orderItem): self
    {
        $this->orderItem = $orderItem;

        return $this;
    }
}
