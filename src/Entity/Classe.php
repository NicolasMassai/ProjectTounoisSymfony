<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $general = null;

    #[ORM\Column]
    private ?int $domicile = null;

    #[ORM\Column]
    private ?int $exterieur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneral(): ?int
    {
        return $this->general;
    }

    public function setGeneral(int $general): self
    {
        $this->general = $general;

        return $this;
    }

    public function getDomicile(): ?int
    {
        return $this->domicile;
    }

    public function setDomicile(int $domicile): self
    {
        $this->domicile = $domicile;

        return $this;
    }

    public function getExterieur(): ?int
    {
        return $this->exterieur;
    }

    public function setExterieur(int $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }
}
