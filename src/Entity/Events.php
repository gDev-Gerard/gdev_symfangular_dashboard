<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
class Events
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $event_name = null;

    #[ORM\Column(nullable: true)]
    private ?float $event_budget = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $event_slug = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?EventsType $event_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventName(): ?string
    {
        return $this->event_name;
    }

    public function setEventName(string $event_name): static
    {
        $this->event_name = $event_name;

        return $this;
    }

    public function getEventBudget(): ?float
    {
        return $this->event_budget;
    }

    public function setEventBudget(?float $event_budget): static
    {
        $this->event_budget = $event_budget;

        return $this;
    }

    public function getEventSlug(): ?string
    {
        return $this->event_slug;
    }

    public function setEventSlug(?string $event_slug): static
    {
        $this->event_slug = $event_slug;

        return $this;
    }

    public function getEventType(): ?EventsType
    {
        return $this->event_type;
    }

    public function setEventType(?EventsType $event_type): static
    {
        $this->event_type = $event_type;

        return $this;
    }
}
