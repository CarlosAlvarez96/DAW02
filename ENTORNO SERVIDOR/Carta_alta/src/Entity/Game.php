<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $player = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $win = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $gameDateTime = null;

    #[ORM\ManyToMany(targetEntity: Card::class)]
    private Collection $cardsPlayer;

    #[ORM\ManyToMany(targetEntity: Card::class)]
    #[ORM\JoinTable(name: "cardsCpu")]
    private Collection $cardsCpu;

    public function __construct()
    {
        $this->cardsPlayer = new ArrayCollection();
        $this->cardsCpu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?User
    {
        return $this->player;
    }

    public function setPlayer(?User $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getWin(): ?int
    {
        return $this->win;
    }

    public function setWin(?int $win): static
    {
        $this->win = $win;

        return $this;
    }

    public function getGameDateTime(): ?\DateTimeInterface
    {
        return $this->gameDateTime;
    }

    public function setGameDateTime(\DateTimeInterface $gameDateTime): static
    {
        $this->gameDateTime = $gameDateTime;

        return $this;
    }

    /**
     * @return Collection<int, Card>
     */
    public function getCardsPlayer(): Collection
    {
        return $this->cardsPlayer;
    }

    public function addCardsPlayer(Card $cardsPlayer): static
    {
        if (!$this->cardsPlayer->contains($cardsPlayer)) {
            $this->cardsPlayer->add($cardsPlayer);
        }

        return $this;
    }

    public function removeCardsPlayer(Card $cardsPlayer): static
    {
        $this->cardsPlayer->removeElement($cardsPlayer);

        return $this;
    }

    /**
     * @return Collection<int, Card>
     */
    public function getCardsCpu(): Collection
    {
        return $this->cardsCpu;
    }

    public function addCardsCpu(Card $cardsCpu): static
    {
        if (!$this->cardsCpu->contains($cardsCpu)) {
            $this->cardsCpu->add($cardsCpu);
        }

        return $this;
    }

    public function removeCardsCpu(Card $cardsCpu): static
    {
        $this->cardsCpu->removeElement($cardsCpu);

        return $this;
    }

    
    public function getBestCardCpu(): Card
    {
        $c=new Card();
        $c->setValue(0);
         foreach($this->cardsCpu as $card) {
            $c = $card->getValue()>$c->getValue()?$card:$c;
         }

        return $c;
    }
}
