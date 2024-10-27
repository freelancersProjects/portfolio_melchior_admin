<?php

namespace App\Entity;

use App\Repository\FilterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilterRepository::class)]
#[ORM\Table(name: "t_filter")]class Filter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_filter = null;

    /**
     * @var Collection<int, Artwork>
     */
    #[ORM\OneToMany(targetEntity: Artwork::class, mappedBy: 'filter')]
    private Collection $artworks;

    public function __construct()
    {
        $this->artworks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFilter(): ?string
    {
        return $this->name_filter;
    }

    public function setNameFilter(string $name_filter): static
    {
        $this->name_filter = $name_filter;

        return $this;
    }

    /**
     * @return Collection<int, Artwork>
     */
    public function getArtworks(): Collection
    {
        return $this->artworks;
    }

    public function addArtwork(Artwork $artwork): static
    {
        if (!$this->artworks->contains($artwork)) {
            $this->artworks->add($artwork);
            $artwork->setFilter($this);
        }

        return $this;
    }

    public function removeArtwork(Artwork $artwork): static
    {
        if ($this->artworks->removeElement($artwork)) {
            // set the owning side to null (unless already changed)
            if ($artwork->getFilter() === $this) {
                $artwork->setFilter(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name_filter;
    }
}
