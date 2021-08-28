<?php

namespace App\Dto\user;

use Doctrine\Common\Collections\ArrayCollection;

class UserDto
{
    /**
     * UserDto constructor.
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $userName
     * @param string|null $password
     * @param ArrayCollection $orders
     */
    public function __construct(
        private ?int $id,
        private ?string $firstName,
        private ?string $lastName,
        private ?string $userName,
        private ?string $password,
        private ArrayCollection $orders
    ) {
        $this->orders = new ArrayCollection();
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
     * @return UserDto
     */
    public function setId(?int $id): UserDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return UserDto
     */
    public function setFirstName(?string $firstName): UserDto
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return UserDto
     */
    public function setLastName(?string $lastName): UserDto
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     * @return UserDto
     */
    public function setUserName(?string $userName): UserDto
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return UserDto
     */
    public function setPassword(?string $password): UserDto
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrders(): ArrayCollection
    {
        return $this->orders;
    }

    /**
     * @param ArrayCollection $orders
     * @return UserDto
     */
    public function setOrders(ArrayCollection $orders): UserDto
    {
        $this->orders = $orders;
        return $this;
    }
}
