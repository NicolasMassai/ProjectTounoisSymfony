<?php

namespace App\Entity;

use App\Repository\ClassementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassementRepository::class)]
class Classement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $general = null;

    #[ORM\Column(length: 255)]
    private ?string $domicile = null;

    #[ORM\Column(length: 255)]
    private ?string $exterieur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneral(): ?string
    {
        return $this->general;
    }

    public function setGeneral(string $general): self
    {
        $this->general = $general;

        return $this;
    }

    public function getDomicile(): ?string
    {
        return $this->domicile;
    }

    public function setDomicile(string $domicile): self
    {
        $this->domicile = $domicile;

        return $this;
    }

    public function getExterieur(): ?string
    {
        return $this->exterieur;
    }

    public function setExterieur(string $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }
}
