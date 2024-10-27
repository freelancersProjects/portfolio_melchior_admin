<?php

namespace App\Entity;

use App\Repository\ArtworkRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ArtworkRepository::class)]
#[ORM\Table(name: 't_artwork')]
#[Vich\Uploadable]
class Artwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $main_image = null;

    #[Vich\UploadableField(mapping: 't_content_images', fileNameProperty: 'main_image')]
    private ?File $main_image_file = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_1 = null;

    #[Vich\UploadableField(mapping: 't_content_images', fileNameProperty: 'image_1')]
    private ?File $image_1_file = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_2 = null;

    #[Vich\UploadableField(mapping: 't_content_images', fileNameProperty: 'image_2')]
    private ?File $image_2_file = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_3 = null;

    #[Vich\UploadableField(mapping: 't_content_images', fileNameProperty: 'image_3')]
    private ?File $image_3_file = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    private ?Filter $filter = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getMainImageFile(): ?File
    {
        return $this->main_image_file;
    }

    public function setMainImageFile(?File $main_image_file = null): static
    {
        $this->main_image_file = $main_image_file;

        if ($main_image_file) {
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getMainImage(): ?string
    {
        return $this->main_image;
    }

    public function setMainImage(string $main_image): static
    {
        $this->main_image = $main_image;

        return $this;
    }

    public function getImageBioFile(): ?File
    {
        return $this->main_image_file;
    }

    public function setImageBioFile(?File $main_image_file = null): static
    {
        $this->main_image_file = $main_image_file;

        if ($main_image_file) {
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image_1;
    }

    public function setImage1(string $image_1): static
    {
        $this->image_1 = $image_1;

        return $this;
    }

    public function getImage1File(): ?File
    {
        return $this->image_1_file;
    }

    public function setImage1File(?File $image_1_file = null): static
    {
        $this->image_1_file = $image_1_file;

        if ($image_1_file) {
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image_2;
    }

    public function setImage2(string $image_2): static
    {
        $this->image_2 = $image_2;

        return $this;
    }

    public function getImage2File(): ?File
    {
        return $this->image_2_file;
    }

    public function setImage2File(?File $image_2_file = null): static
    {
        $this->image_2_file = $image_2_file;

        if ($image_2_file) {
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image_3;
    }

    public function setImage3(string $image_3): static
    {
        $this->image_3 = $image_3;

        return $this;
    }

    public function getImage3File(): ?File
    {
        return $this->image_3_file;
    }

    public function setImage3File(?File $image_3_file = null): static
    {
        $this->image_3_file = $image_3_file;

        if ($image_3_file) {
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getFilter(): ?Filter
    {
        return $this->filter;
    }

    public function setFilter(?Filter $filter): static
    {
        $this->filter = $filter;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
