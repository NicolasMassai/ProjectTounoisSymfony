<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

 

    #[ORM\OneToOne(mappedBy: 'equipe', cascade: ['persist', 'remove'])]
    private ?Stade $stade = null;

    #[ORM\OneToOne(mappedBy: 'equipe', cascade: ['persist', 'remove'])]
    private ?Joueur $joueur = null;

    #[ORM\OneToMany(mappedBy: 'equipe', targetEntity: Matchs::class)]
    private Collection $matchs;

    public function __construct()
    {
        $this->matchs = new ArrayCollection();
    }

   
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

    /**
     * @return Collection<int, Matchs>
     */
    public function getMatchs(): Collection
    {
        return $this->matchs;
    }

    public function addMatch(Matchs $match): self
    {
        if (!$this->matchs->contains($match)) {
            $this->matchs->add($match);
            $match->setEquipe($this);
        }

        return $this;
    }

    public function removeMatch(Matchs $match): self
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getEquipe() === $this) {
                $match->setEquipe(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name; // Remplacer champ par une propriété "string" de l'entité
    }

}
