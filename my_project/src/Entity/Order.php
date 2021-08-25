<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
#[ApiResource(
    normalizationContext: ['groups' => ['order:read']]
)]
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"order:read", "item:read", "user:read"})
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"order:read"})
     */
    private ?User $customer;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"order:read"})
     */
    private ?\DateTimeInterface $orderDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"order:read"})
     */
    private ?string $status;

    /**
     * @ORM\Column(type="float")
     * @Groups({"order:read"})
     */
    private ?float $price;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="orderItem")
     * @Groups({"order:read"})
     */
    private ArrayCollection $items;

    /**
     * Order constructor.
     */
    public function __construct()
    {
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
     * @return User|null
     */
    public function getCustomer(): ?User
    {
        return $this->customer;
    }

    /**
     * @param User|null $customer
     * @return $this
     */
    public function setCustomer(?User $customer): self
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
     * @param \DateTimeInterface $orderDate
     * @return $this
     */
    public function setOrderDate(\DateTimeInterface $orderDate): self
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
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self
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
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setOrderItem($this);
        }

        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getOrderItem() === $this) {
                $item->setOrderItem(null);
            }
        }

        return $this;
    }
}
