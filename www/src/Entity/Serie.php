<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={"put", "patch",
 *     "get"={"path"="/i❤️serie/{id}"}},
 *     normalizationContext={"groups"={"serie_listing:read"}},
 *     denormalizationContext={"groups"={"serie_listing:write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\SerieRepository")
 */
class Serie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"serie_listing:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"serie_listing:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups({"serie_listing:read", "serie_listing:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"serie_listing:read", "serie_listing:write"})
     */
    private $seasons;

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

    public function getSeasons(): ?int
    {
        return $this->seasons;
    }

    public function setSeasons(?int $seasons): self
    {
        $this->seasons = $seasons;

        return $this;
    }
}
