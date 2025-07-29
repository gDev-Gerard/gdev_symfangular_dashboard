<?php

namespace App\Entity;

use App\Repository\EventsFactsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventsFactsRepository::class)]
class EventsFacts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $eventfact_title = null;

    #[ORM\Column]
    private ?\DateTime $eventfact_date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $eventfact_comment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventfactTitle(): ?string
    {
        return $this->eventfact_title;
    }

    public function setEventfactTitle(string $eventfact_title): static
    {
        $this->eventfact_title = $eventfact_title;

        return $this;
    }

    public function getEventfactDate(): ?\DateTime
    {
        return $this->eventfact_date;
    }

    public function setEventfactDate(\DateTime $eventfact_date): static
    {
        $this->eventfact_date = $eventfact_date;

        return $this;
    }

    public function getEventfactComment(): ?string
    {
        return $this->eventfact_comment;
    }

    public function setEventfactComment(?string $eventfact_comment): static
    {
        $this->eventfact_comment = $eventfact_comment;

        return $this;
    }
}
