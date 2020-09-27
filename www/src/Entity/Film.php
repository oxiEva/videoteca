<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Carbon\Carbon;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *     "get"={},
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
     * @Groups({"film_listing:read"})
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="filmsListing")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"films_listing:read", "films_listing:write"})
     */
    private $owner;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
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

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

}
