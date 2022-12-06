<?php

namespace App\Entity;

class RequestBuilding
{
    public const STATE_PENDIENTE = 'PENDIENTE';

    public int $id;
    public string $title;
    public string $requestState;
    public \DateTimeInterface $requestDate;
    public string $description;
    public int $idWarehouse;

    public function __construct()
    {
        $this->requestDate = new \DateTime('now');
        $this->requestState = self::STATE_PENDIENTE;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRequestState(): ?string
    {
        return $this->requestState;
    }

    public function setRequestState(string $requestState): self
    {
        $this->requestState = $requestState;

        return $this;
    }

    public function getRequestDate(): ?\DateTimeInterface
    {
        return $this->requestDate;
    }

    public function setRequestDate(\DateTimeInterface $requestDate): self
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdWarehouse(): ?int
    {
        return $this->idWarehouse;
    }

    public function setIdWarehouse(int $idWarehouse): self
    {
        $this->idWarehouse = $idWarehouse;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}
