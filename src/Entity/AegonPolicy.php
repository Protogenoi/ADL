<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AegonPolicyRepository")
 */
class AegonPolicy
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
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $appID;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $premium;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $commission;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $nonIdemComm;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $drip;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $coverAmount;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $term;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $cbTerm;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $commType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Policy", mappedBy="aegonPolicy")
     */
    private $policy;

    public function __construct()
    {
        $this->policy = new ArrayCollection();
    }

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

    public function getAppID(): ?string
    {
        return $this->appID;
    }

    public function setAppID(?string $appID): self
    {
        $this->appID = $appID;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPremium()
    {
        return $this->premium;
    }

    public function setPremium($premium): self
    {
        $this->premium = $premium;

        return $this;
    }

    public function getCommission()
    {
        return $this->commission;
    }

    public function setCommission($commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getNonIdemComm()
    {
        return $this->nonIdemComm;
    }

    public function setNonIdemComm($nonIdemComm): self
    {
        $this->nonIdemComm = $nonIdemComm;

        return $this;
    }

    public function getDrip()
    {
        return $this->drip;
    }

    public function setDrip($drip): self
    {
        $this->drip = $drip;

        return $this;
    }

    public function getCoverAmount()
    {
        return $this->coverAmount;
    }

    public function setCoverAmount($coverAmount): self
    {
        $this->coverAmount = $coverAmount;

        return $this;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(?string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getCbTerm(): ?string
    {
        return $this->cbTerm;
    }

    public function setCbTerm(?string $cbTerm): self
    {
        $this->cbTerm = $cbTerm;

        return $this;
    }

    public function getCommType(): ?string
    {
        return $this->commType;
    }

    public function setCommType(?string $commType): self
    {
        $this->commType = $commType;

        return $this;
    }

    /**
     * @return Collection|Policy[]
     */
    public function getPolicy(): Collection
    {
        return $this->policy;
    }

    public function addPolicy(Policy $policy): self
    {
        if (!$this->policy->contains($policy)) {
            $this->policy[] = $policy;
            $policy->setAegonPolicy($this);
        }

        return $this;
    }

    public function removePolicy(Policy $policy): self
    {
        if ($this->policy->contains($policy)) {
            $this->policy->removeElement($policy);
            // set the owning side to null (unless already changed)
            if ($policy->getAegonPolicy() === $this) {
                $policy->setAegonPolicy(null);
            }
        }

        return $this;
    }
}
