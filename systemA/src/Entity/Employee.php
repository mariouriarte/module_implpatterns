<?php

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class Employee
{
    private ?string $nombres = null;

    private ?string $apellido_1 = null;

    private ?string $apellido_2 = null;

    private ?string $apellido_3 = null;

    private ?string $nickname = null;

    private string $id;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellido1(): ?string
    {
        return $this->apellido_1;
    }

    public function setApellido1(string $apellido_1): self
    {
        $this->apellido_1 = $apellido_1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido_2;
    }

    public function setApellido2(string $apellido_2): self
    {
        $this->apellido_2 = $apellido_2;

        return $this;
    }

    public function getApellido3(): ?string
    {
        return $this->apellido_3;
    }

    public function setApellido3(?string $apellido_3): self
    {
        $this->apellido_3 = $apellido_3;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
