<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $num = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\ManyToMany(targetEntity: Pokedex::class, mappedBy: 'pokemon')]
    private Collection $pokedexes;



    #[ORM\ManyToMany(targetEntity: Team::class, mappedBy: 'Pokemon')]
    private Collection $teams;

    public function __construct()
    {
        $this->pokedexes = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): static
    {
        $this->num = $num;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return Collection<int, Pokedex>
     */
    public function getPokedexes(): Collection
    {
        return $this->pokedexes;
    }

    public function addPokedex(Pokedex $pokedex): static
    {
        if (!$this->pokedexes->contains($pokedex)) {
            $this->pokedexes->add($pokedex);
            $pokedex->addPokemon($this);
        }

        return $this;
    }

    public function removePokedex(Pokedex $pokedex): static
    {
        if ($this->pokedexes->removeElement($pokedex)) {
            $pokedex->removePokemon($this);
        }

        return $this;
    }



    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): static
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
            $team->addPokemon($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): static
    {
        if ($this->teams->removeElement($team)) {
            $team->removePokemon($this);
        }

        return $this;
    }
}
