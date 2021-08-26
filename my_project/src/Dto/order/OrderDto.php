<?php
namespace App\Dto\order;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class OrderDto
{
    /**
     * OrderDto constructor.
     * @param int|null $id
     * @param User|null $customer
     * @param \DateTimeInterface|null $orderDate
     * @param string|null $status
     * @param float|null $price
     * @param ArrayCollection $items
     */
    public function __construct(
        private ?int $id,
        private ?User $customer,
        private ?\DateTimeInterface $orderDate,
        private ?string $status,
        private ?float $price,
        private ArrayCollection $items
    ) {
        $this->items = new ArrayCollection();
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
     * @return OrderDto
     */
    public function setId(?int $id): OrderDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getCustomer(): ?User
    {
        return $this->customer;
    }

    /**
     * @param User|null $customer
     * @return OrderDto
     */
    public function setCustomer(?User $customer): OrderDto
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    /**
     * @param \DateTimeInterface|null $orderDate
     * @return OrderDto
     */
    public function setOrderDate(?\DateTimeInterface $orderDate): OrderDto
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return OrderDto
     */
    public function setStatus(?string $status): OrderDto
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return OrderDto
     */
    public function setPrice(?float $price): OrderDto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getItems(): ArrayCollection
    {
        return $this->items;
    }

    /**
     * @param ArrayCollection $items
     * @return OrderDto
     */
    public function setItems(ArrayCollection $items): OrderDto
    {
        $this->items = $items;
        return $this;
    }
}
