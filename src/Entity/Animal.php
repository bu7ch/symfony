<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'integer')]
    private $poids;

    #[ORM\Column(type: 'boolean')]
    private $dangerosite;

    #[ORM\ManyToOne(targetEntity: Famille::class, inversedBy: 'animaux')]
    #[ORM\JoinColumn(nullable: false)]
    private $famille;

    #[ORM\ManyToMany(targetEntity: Continent::class, mappedBy: 'animaux')]
    private $continents;

    #[ORM\OneToMany(mappedBy: 'animal', targetEntity: Dispose::class)]
    private $disposes;

    public function __construct()
    {
        $this->continents = new ArrayCollection();
        $this->disposes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getDangerosite(): ?bool
    {
        return $this->dangerosite;
    }

    public function setDangerosite(bool $dangerosite): self
    {
        $this->dangerosite = $dangerosite;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection<int, Continent>
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): self
    {
        if (!$this->continents->contains($continent)) {
            $this->continents[] = $continent;
            $continent->addAnimaux($this);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): self
    {
        if ($this->continents->removeElement($continent)) {
            $continent->removeAnimaux($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Dispose>
     */
    public function getDisposes(): Collection
    {
        return $this->disposes;
    }

    public function addDispose(Dispose $dispose): self
    {
        if (!$this->disposes->contains($dispose)) {
            $this->disposes[] = $dispose;
            $dispose->setAnimal($this);
        }

        return $this;
    }

    public function removeDispose(Dispose $dispose): self
    {
        if ($this->disposes->removeElement($dispose)) {
            // set the owning side to null (unless already changed)
            if ($dispose->getAnimal() === $this) {
                $dispose->setAnimal(null);
            }
        }

        return $this;
    }
}
