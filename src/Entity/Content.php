<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ContentRepository::class)]
#[ORM\Table(name: 't_content')]
#[Vich\Uploadable]
class Content
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $main_name = null;

    #[ORM\Column(length: 255)]
    private ?string $title_bio = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_bio = null;

    #[Vich\UploadableField(mapping: 't_content_images', fileNameProperty: 'image_bio')]
    private ?File $image_bio_file = null;

    #[ORM\Column(length: 255)]
    private ?string $image_bio = null;

    #[Vich\UploadableField(mapping: 't_content_video', fileNameProperty: 'video_bio')]
    private ?File $video_file = null;

    #[ORM\Column(length: 255)]
    private ?string $video_bio = null;

    #[ORM\Column(length: 255)]
    private ?string $title_artwork = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_bio_en = null;

    // Getters et Setters pour chaque propriété...

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImageBioFile(): ?File
    {
        return $this->image_bio_file;
    }

    public function setImageBioFile(?File $image_bio_file = null): static
    {
        $this->image_bio_file = $image_bio_file;

        if ($image_bio_file) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getImageBio(): ?string
    {
        return $this->image_bio;
    }

    public function setImageBio(?string $image_bio): self
    {
        $this->image_bio = $image_bio;

        return $this;
    }

    public function getVideoFile(): ?File
    {
        return $this->video_file;
    }

    public function setVideoFile(?File $video_file = null): static
    {
        $this->video_file = $video_file;

        if ($video_file) {
            $this->updatedAt = new \DateTimeImmutable();
        }

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

    public function getDescriptionBioEn(): ?string
    {
        return $this->description_bio_en;
    }

    public function setDescriptionBioEn(?string $description_bio_en): static
    {
        $this->description_bio_en = $description_bio_en;

        return $this;
    }
}
