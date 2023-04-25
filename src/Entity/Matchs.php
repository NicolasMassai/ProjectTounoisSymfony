<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchsRepository::class)]
class Matchs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $equipeDom = null;

    #[ORM\Column(length: 255)]
    private ?string $equipeExt = null;

    #[ORM\Column]
    private ?int $scoreDom = null;

    #[ORM\Column]
    private ?int $scoreExt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

 

    #[ORM\ManyToOne(inversedBy: 'matchs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stade $stade = null;

    #[ORM\ManyToOne(inversedBy: 'matchs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipeDom(): ?string
    {
        return $this->equipeDom;
    }

    public function setEquipeDom(string $equipeDom): self
    {
        $this->equipeDom = $equipeDom;

        return $this;
    }

    public function getEquipeExt(): ?string
    {
        return $this->equipeExt;
    }

    public function setEquipeExt(string $equipeExt): self
    {
        $this->equipeExt = $equipeExt;

        return $this;
    }

    public function getScoreDom(): ?int
    {
        return $this->scoreDom;
    }

    public function setScoreDom(int $scoreDom): self
    {
        $this->scoreDom = $scoreDom;

        return $this;
    }

    public function getScoreExt(): ?int
    {
        return $this->scoreExt;
    }

    public function setScoreExt(int $scoreExt): self
    {
        $this->scoreExt = $scoreExt;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
    

    public function getStade(): ?Stade
    {
        return $this->stade;
    }

    public function setStade(?Stade $stade): self
    {
        $this->stade = $stade;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    
}
