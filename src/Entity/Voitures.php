<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $monthly_price = null;

    #[ORM\Column]
    private ?int $daily_price = null;

    #[ORM\Column]
    private ?int $places = null;

    #[ORM\Column]
    private ?bool $motor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyPrice(): ?int
    {
        return $this->monthly_price;
    }

    public function setMonthlyPrice(int $monthly_price): static
    {
        $this->monthly_price = $monthly_price;

        return $this;
    }

    public function getDailyPrice(): ?int
    {
        return $this->daily_price;
    }

    public function setDailyPrice(int $daily_price): static
    {
        $this->daily_price = $daily_price;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function isMotor(): ?bool
    {
        return $this->motor;
    }

    public function setMotor(bool $motor): static
    {
        $this->motor = $motor;

        return $this;
    }
}
