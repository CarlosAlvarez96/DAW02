<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Pokedex $Pokedex = null;

    #[ORM\ManyToMany(targetEntity: Pokemon::class, inversedBy: 'teams')]
    private Collection $Pokemon;

    public function __construct()
    {
        $this->Pokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokedex(): ?Pokedex
    {
        return $this->Pokedex;
    }

    public function setPokedex(?Pokedex $Pokedex): static
    {
        $this->Pokedex = $Pokedex;

        return $this;
    }

    /**
     * @return Collection<int, Pokemon>
     */
    public function getPokemon(): Collection
    {
        return $this->Pokemon;
    }

    public function addPokemon(Pokemon $pokemon): static
    {
        if (!$this->Pokemon->contains($pokemon)) {
            $this->Pokemon->add($pokemon);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): static
    {
        $this->Pokemon->removeElement($pokemon);

        return $this;
    }
}
