<?php
namespace App\Dto\product;

class ProductDto
{
    /**
     * ProductDto constructor.
     * @param int|null $id
     * @param string|null $sku
     * @param string|null $name
     * @param float|null $price
     */
    public function __construct(
        private ?int $id,
        private ?string $sku,
        private ?string $name,
        private ?float $price
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
     * @return ProductDto
     */
    public function setId(?int $id): ProductDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return ProductDto
     */
    public function setSku(?string $sku): ProductDto
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ProductDto
     */
    public function setName(?string $name): ProductDto
    {
        $this->name = $name;
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
     * @return ProductDto
     */
    public function setPrice(?float $price): ProductDto
    {
        $this->price = $price;
        return $this;
    }
}
