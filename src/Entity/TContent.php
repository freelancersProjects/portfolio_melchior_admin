<?php

namespace App\Entity;

use App\Repository\TContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TContentRepository::class)]
#[ORM\Table(name: 't_content')]
class TContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image_background = null;

    #[ORM\Column(length: 255)]
    private ?string $main_name = null;

    #[ORM\Column(length: 255)]
    private ?string $title_bio = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_bio = null;

    #[ORM\Column(length: 255)]
    private ?string $image_bio = null;

    #[ORM\Column(length: 255)]
    private ?string $video_bio = null;

    #[ORM\Column(length: 255)]
    private ?string $title_artwork = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageBackground(): ?string
    {
        return $this->image_background;
    }

    public function setImageBackground(string $image_background): static
    {
        $this->image_background = $image_background;

        return $this;
    }

    public function getMainName(): ?string
    {
        return $this->main_name;
    }

    public function setMainName(string $main_name): static
    {
        $this->main_name = $main_name;

        return $this;
    }

    public function getTitleBio(): ?string
    {
        return $this->title_bio;
    }

    public function setTitleBio(string $title_bio): static
    {
        $this->title_bio = $title_bio;

        return $this;
    }

    public function getDescriptionBio(): ?string
    {
        return $this->description_bio;
    }

    public function setDescriptionBio(string $description_bio): static
    {
        $this->description_bio = $description_bio;

        return $this;
    }

    public function getImageBio(): ?string
    {
        return $this->image_bio;
    }

    public function setImageBio(string $image_bio): static
    {
        $this->image_bio = $image_bio;

        return $this;
    }

    public function getVideoBio(): ?string
    {
        return $this->video_bio;
    }

    public function setVideoBio(string $video_bio): static
    {
        $this->video_bio = $video_bio;

        return $this;
    }

    public function getTitleArtwork(): ?string
    {
        return $this->title_artwork;
    }

    public function setTitleArtwork(string $title_artwork): static
    {
        $this->title_artwork = $title_artwork;

        return $this;
    }
}
