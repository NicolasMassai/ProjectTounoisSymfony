<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JoueurRepository;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
#[ORM\InheritanceType("JOINED")]
#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?float $taille = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\OneToOne(inversedBy: 'joueur', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    #[ORM\OneToOne(mappedBy: 'joueur', cascade: ['persist', 'remove'])]
    private ?Statistique $statistique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getStatistique(): ?Statistique
    {
        return $this->statistique;
    }

    public function setStatistique(Statistique $statistique): self
    {
        // set the owning side of the relation if necessary
        if ($statistique->getJoueur() !== $this) {
            $statistique->setJoueur($this);
        }

        $this->statistique = $statistique;

        return $this;
    }
}
