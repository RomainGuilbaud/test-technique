<?php
namespace App\Dto\order;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;

class OrderDto
{
    /**
     * OrderDto constructor.
     * @param int|null $id
     * @param UserInterface|null $customer
     * @param \DateTimeInterface|null $orderDate
     * @param string|null $status
     * @param float|null $price
     * @param array $items
     */
    public function __construct(
        private ?int $id,
        private ?UserInterface $customer,
        private ?\DateTimeInterface $orderDate,
        private ?string $status,
        private ?float $price,
        private array $items
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
     * @return OrderDto
     */
    public function setId(?int $id): OrderDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return UserInterface|null
     */
    public function getCustomer(): ?User
    {
        return $this->customer;
    }

    /**
     * @param UserInterface|null $customer
     * @return OrderDto
     */
    public function setCustomer(?UserInterface $customer): OrderDto
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
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return OrderDto
     */
    public function setItems(array $items): OrderDto
    {
        $this->items = $items;
        return $this;
    }
}
