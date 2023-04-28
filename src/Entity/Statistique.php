<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatistiqueRepository::class)]
class Statistique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $buteur = null;

    #[ORM\Column(length: 255)]
    private ?string $passeur = null;

    #[ORM\OneToOne(inversedBy: 'statistique', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Joueur $joueur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getButeur(): ?string
    {
        return $this->buteur;
    }

    public function setButeur(string $buteur): self
    {
        $this->buteur = $buteur;

        return $this;
    }

    public function getPasseur(): ?string
    {
        return $this->passeur;
    }

    public function setPasseur(string $passeur): self
    {
        $this->passeur = $passeur;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function __toString(){
        return $this->buteur; // Remplacer champ par une propriété "string" de l'entité
    }

}
