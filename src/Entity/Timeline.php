<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimelineRepository")
 */
class Timeline
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $notetype;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addedDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addedBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="timelines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotetype(): ?string
    {
        return $this->notetype;
    }

    public function setnotetype(string $notetype): self
    {
        $this->notetype = $notetype;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getAddedDate(): ?\DateTimeInterface
    {
        return $this->addedDate;
    }

    public function setAddedDate(\DateTimeInterface $addedDate): self
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    public function getAddedBy(): ?string
    {
        return $this->addedBy;
    }

    public function setAddedBy(string $addedBy): self
    {
        $this->addedBy = $addedBy;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }
}
