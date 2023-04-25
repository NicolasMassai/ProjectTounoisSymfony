<?php

namespace App\Entity;

use App\Entity\Joueur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FootRepository;

#[ORM\Entity(repositoryClass: FootRepository::class)]
class Foot extends Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $piedfort = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPiedfort(): ?string
    {
        return $this->piedfort;
    }

    public function setPiedfort(string $piedfort): self
    {
        $this->piedfort = $piedfort;

        return $this;
    }
}
