<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\ManyToOne(inversedBy: 'equipe')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Matchs $matchs = null;

    #[ORM\OneToOne(mappedBy: 'equipe', cascade: ['persist', 'remove'])]
    private ?Stade $stade = null;

    #[ORM\OneToOne(mappedBy: 'equipe', cascade: ['persist', 'remove'])]
    private ?Joueur $joueur = null;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getMatchs(): ?Matchs
    {
        return $this->matchs;
    }

    public function setMatchs(?Matchs $matchs): self
    {
        $this->matchs = $matchs;

        return $this;
    }

    public function getStade(): ?Stade
    {
        return $this->stade;
    }

    public function setStade(Stade $stade): self
    {
        // set the owning side of the relation if necessary
        if ($stade->getEquipe() !== $this) {
            $stade->setEquipe($this);
        }

        $this->stade = $stade;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(Joueur $joueur): self
    {
        // set the owning side of the relation if necessary
        if ($joueur->getEquipe() !== $this) {
            $joueur->setEquipe($this);
        }

        $this->joueur = $joueur;

        return $this;
    }

}
