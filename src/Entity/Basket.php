<?php

namespace App\Entity;

use App\Repository\BasketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BasketRepository::class)]
class Basket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mainforte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainforte(): ?string
    {
        return $this->mainforte;
    }

    public function setMainforte(string $mainforte): self
    {
        $this->mainforte = $mainforte;

        return $this;
    }
}
