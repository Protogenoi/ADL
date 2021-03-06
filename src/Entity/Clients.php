<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
class Clients
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="title.not_blank")
     * @ORM\Column(type="string", length=10)
     */
    private $title;

    /**
     * @Assert\NotBlank(message="firstname.not_blank")
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @Assert\NotBlank(message="lastname.not_blank")
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @Assert\NotBlank(message="Enter a valid DOB Y-m-d")
     * @Assert\Type("\DateTime")
     * @ORM\Column(type="date")
     */
    private $dob;

    /**
     * @Assert\NotBlank(message="email.not_blank")
     * @Assert\Email()
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Assert\NotBlank(message="phone.not_blank")
     * @ORM\Column(type="string", length=12)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $altNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName2;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dob2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email2;

    /**
     * @Assert\NotBlank(message="address1.not_blank")
     * @ORM\Column(type="string", length=255)
     */
    private $address1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $town;

    /**
     * @Assert\NotBlank(message="postcode.not_blank")
     * @ORM\Column(type="string", length=20)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $owner;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $addedDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $updatedBy;

    /**
     * @var \DateTime $updatedDate
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Policy", mappedBy="client")
     */
    private $policies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Timeline", mappedBy="client")
     */
    private $timelines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Uploads", mappedBy="client")
     */
    private $uploads;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SmsInbound", mappedBy="client")
     */
    private $smsInbounds;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function __construct()
    {
        $this->policies = new ArrayCollection();
        $this->timelines = new ArrayCollection();
        $this->uploads = new ArrayCollection();
        $this->smsInbounds = new ArrayCollection();
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDob(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDob(\DateTimeInterface $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getAltNumber(): ?string
    {
        return $this->altNumber;
    }

    public function setAltNumber(?string $altNumber): self
    {
        $this->altNumber = $altNumber;

        return $this;
    }

    public function getTitle2(): ?string
    {
        return $this->title2;
    }

    public function setTitle2(?string $title2): self
    {
        $this->title2 = $title2;

        return $this;
    }

    public function getFirstName2(): ?string
    {
        return $this->firstName2;
    }

    public function setFirstName2(?string $firstName2): self
    {
        $this->firstName2 = $firstName2;

        return $this;
    }

    public function getLastName2(): ?string
    {
        return $this->lastName2;
    }

    public function setLastName2(?string $lastName2): self
    {
        $this->lastName2 = $lastName2;

        return $this;
    }

    public function getDob2(): ?\DateTimeInterface
    {
        return $this->dob2;
    }

    public function setDob2(?\DateTimeInterface $dob2): self
    {
        $this->dob2 = $dob2;

        return $this;
    }

    public function getEmail2(): ?string
    {
        return $this->email2;
    }

    public function setEmail2(?string $email2): self
    {
        $this->email2 = $email2;

        return $this;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    public function getAddress3(): ?string
    {
        return $this->address3;
    }

    public function setAddress3(?string $address3): self
    {
        $this->address3 = $address3;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(?string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

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

    /**
     * @return Collection|Policy[]
     */
    public function getPolicies(): Collection
    {
        return $this->policies;
    }

    public function addPolicy(Policy $policy): self
    {
        if (!$this->policies->contains($policy)) {
            $this->policies[] = $policy;
            $policy->setClient($this);
        }

        return $this;
    }

    public function removePolicy(Policy $policy): self
    {
        if ($this->policies->contains($policy)) {
            $this->policies->removeElement($policy);
            // set the owning side to null (unless already changed)
            if ($policy->getClient() === $this) {
                $policy->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Timeline[]
     */
    public function getTimelines(): Collection
    {
        return $this->timelines;
    }

    public function addTimeline(Timeline $timeline): self
    {
        if (!$this->timelines->contains($timeline)) {
            $this->timelines[] = $timeline;
            $timeline->setClient($this);
        }

        return $this;
    }

    public function removeTimeline(Timeline $timeline): self
    {
        if ($this->timelines->contains($timeline)) {
            $this->timelines->removeElement($timeline);
            // set the owning side to null (unless already changed)
            if ($timeline->getClient() === $this) {
                $timeline->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Uploads[]
     */
    public function getUploads(): Collection
    {
        return $this->uploads;
    }

    public function addUpload(Uploads $upload): self
    {
        if (!$this->uploads->contains($upload)) {
            $this->uploads[] = $upload;
            $upload->setClient($this);
        }

        return $this;
    }

    public function removeUpload(Uploads $upload): self
    {
        if ($this->uploads->contains($upload)) {
            $this->uploads->removeElement($upload);
            // set the owning side to null (unless already changed)
            if ($upload->getClient() === $this) {
                $upload->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SmsInbound[]
     */
    public function getSmsInbounds(): Collection
    {
        return $this->smsInbounds;
    }

    public function addSmsInbound(SmsInbound $smsInbound): self
    {
        if (!$this->smsInbounds->contains($smsInbound)) {
            $this->smsInbounds[] = $smsInbound;
            $smsInbound->setClient($this);
        }

        return $this;
    }

    public function removeSmsInbound(SmsInbound $smsInbound): self
    {
        if ($this->smsInbounds->contains($smsInbound)) {
            $this->smsInbounds->removeElement($smsInbound);
            // set the owning side to null (unless already changed)
            if ($smsInbound->getClient() === $this) {
                $smsInbound->setClient(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

}
