<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CopyRepository")
 */
class Copy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $filmId;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfSale;

    /**
     * @ORM\Column(type="date")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="copies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vendor;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFilmId(): ?int
    {
        return $this->filmId;
    }

    public function setFilmId(int $filmId): self
    {
        $this->filmId = $filmId;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateOfSale(): ?\DateTimeInterface
    {
        return $this->dateOfSale;
    }

    public function setDateOfSale(?\DateTimeInterface $dateOfSale): self
    {
        $this->dateOfSale = $dateOfSale;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getVendor(): ?User
    {
        return $this->vendor;
    }

    public function setVendor(?User $vendor): self
    {
        $this->vendor = $vendor;

        return $this;
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
