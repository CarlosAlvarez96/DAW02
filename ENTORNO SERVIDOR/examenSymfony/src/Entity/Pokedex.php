<?php

namespace App\Entity;

use App\Repository\PokedexRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokedexRepository::class)]
class Pokedex
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Pokemon::class, inversedBy: 'pokedexes')]
    private Collection $pokemon;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->pokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, pokemon>
     */
    public function getPokemon(): Collection
    {
        return $this->pokemon;
    }

    public function addPokemon(Pokemon $pokemon): static
    {
        if (!$this->pokemon->contains($pokemon)) {
            $this->pokemon->add($pokemon);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): static
    {
        $this->pokemon->removeElement($pokemon);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
