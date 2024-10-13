<?php

namespace App\Entity;

use App\Repository\TFilterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TFilterRepository::class)]
#[ORM\Table(name: "t_filter")]class TFilter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_filter = null;

    /**
     * @var Collection<int, TArtwork>
     */
    #[ORM\OneToMany(targetEntity: TArtwork::class, mappedBy: 'filter')]
    private Collection $tArtworks;

    public function __construct()
    {
        $this->tArtworks = new ArrayCollection();
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
     * @return Collection<int, TArtwork>
     */
    public function getTArtworks(): Collection
    {
        return $this->tArtworks;
    }

    public function addTArtwork(TArtwork $tArtwork): static
    {
        if (!$this->tArtworks->contains($tArtwork)) {
            $this->tArtworks->add($tArtwork);
            $tArtwork->setFilter($this);
        }

        return $this;
    }

    public function removeTArtwork(TArtwork $tArtwork): static
    {
        if ($this->tArtworks->removeElement($tArtwork)) {
            // set the owning side to null (unless already changed)
            if ($tArtwork->getFilter() === $this) {
                $tArtwork->setFilter(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name_filter;
    }
}
