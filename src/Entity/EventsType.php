<?php

namespace App\Entity;

use App\Repository\EventsTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventsTypeRepository::class)]
class EventsType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $eventtype_name = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $eventtype_slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventtypeName(): ?string
    {
        return $this->eventtype_name;
    }

    public function setEventtypeName(string $eventtype_name): static
    {
        $this->eventtype_name = $eventtype_name;

        return $this;
    }

    public function getEventtypeSlug(): ?string
    {
        return $this->eventtype_slug;
    }

    public function setEventtypeSlug(?string $eventtype_slug): static
    {
        $this->eventtype_slug = $eventtype_slug;

        return $this;
    }
}
