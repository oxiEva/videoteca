<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Carbon\Carbon;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *     "get"={
 *              "normalization_context"={"groups"={"film_listing:read", "film_listing:item:get"}},
 *          },
 *     "put",
 *     "delete"},
 *     shortName="Films",
 *     normalizationContext={"groups"={"film_listing:read"}, "swagger_definition_name"="Read"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"film_listing:read", "user:read"})
     */
    private $title;

    /**
     * A little description for the film
     * @ORM\Column(type="string", length=512)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     max=500,
     *     maxMessage="Describe the film in 500 chars or less"
     * )
     * @Groups({"film_listing:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Copy", mappedBy="film")
     */
    private $units;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->units = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * How long ago in text that this cheese listing was added.
     *
     * @Groups("film_listing:read")
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAtAgo(): string
    {
        return Carbon::instance($this->getCreatedAt())->diffForHumans();
    }

    public function __toString(): string
    {
            return $this->title;
    }

    /**
     * @return Collection|Copy[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Copy $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setFilm($this);
        }

        return $this;
    }

    public function removeUnit(Copy $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getFilm() === $this) {
                $unit->setFilm(null);
            }
        }

        return $this;
    }
}
