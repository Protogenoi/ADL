<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PolicyRepository")
 */
class Policy
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
    private $reference;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $insurer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $policyHolder;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $closer;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $agent;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $qc;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $saleDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $subDate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $addedBy;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addedDate;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $updatedBy;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="policies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AegonPolicy", inversedBy="policy")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aegonPolicy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getInsurer(): ?string
    {
        return $this->insurer;
    }

    public function setInsurer(string $insurer): self
    {
        $this->insurer = $insurer;

        return $this;
    }

    public function getPolicyHolder(): ?string
    {
        return $this->policyHolder;
    }

    public function setPolicyHolder(string $policyHolder): self
    {
        $this->policyHolder = $policyHolder;

        return $this;
    }

    public function getCloser(): ?string
    {
        return $this->closer;
    }

    public function setCloser(string $closer): self
    {
        $this->closer = $closer;

        return $this;
    }

    public function getAgent(): ?string
    {
        return $this->agent;
    }

    public function setAgent(string $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function getQc(): ?string
    {
        return $this->qc;
    }

    public function setQc(string $qc): self
    {
        $this->qc = $qc;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSaleDate(): ?\DateTimeInterface
    {
        return $this->saleDate;
    }

    public function setSaleDate(\DateTimeInterface $saleDate): self
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    public function getSubDate(): ?\DateTimeInterface
    {
        return $this->subDate;
    }

    public function setSubDate(?\DateTimeInterface $subDate): self
    {
        $this->subDate = $subDate;

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

    public function getAddedDate(): ?\DateTimeInterface
    {
        return $this->addedDate;
    }

    public function setAddedDate(\DateTimeInterface $addedDate): self
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function getUpdatedDate(): ?\DateTimeInterface
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(?\DateTimeInterface $updatedDate): self
    {
        $this->updatedDate = $updatedDate;

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

    public function getAegonPolicy(): ?AegonPolicy
    {
        return $this->aegonPolicy;
    }

    public function setAegonPolicy(?AegonPolicy $aegonPolicy): self
    {
        $this->aegonPolicy = $aegonPolicy;

        return $this;
    }
}
