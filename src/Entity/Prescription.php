<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_create;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_update;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_delete;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_create;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_update;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_delete;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


  

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;



    #[ORM\ManyToOne]
    private ?Consultation $consultation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable:true)]
    private ?Pharmacien $pharmacien = null;
    #[ORM\OneToMany(mappedBy: 'prescription', targetEntity: LignePrescription::class, cascade: ['persist', 'remove'])]
    private Collection $lignePrescriptions;

    public function __construct()
    {
        $this->lignePrescriptions = new ArrayCollection();
    }
    /**
     * @return Collection<int, LignePrescription>
     */
    public function getLignePrescriptions(): Collection
    {
        return $this->lignePrescriptions;
    }

    public function addLignePrescription(LignePrescription $lignePrescription): self
    {
        if (!$this->lignePrescriptions->contains($lignePrescription)) {
            $this->lignePrescriptions->add($lignePrescription);
            $lignePrescription->setPrescription($this);
        }

        return $this;
    }

    public function removeLignePrescription(LignePrescription $lignePrescription): self
    {
        if ($this->lignePrescriptions->removeElement($lignePrescription)) {
            // set the owning side to null (unless already changed)
            if ($lignePrescription->getPrescription() === $this) {
                $lignePrescription->setPrescription(null);
            }
        }

        return $this;
    }


    public function getUserCreate(): ?string
    {
        return $this->user_create;
    }

    public function setUserCreate(?string $user_create): static
    {
        $this->user_create = $user_create;

        return $this;
    }

    public function getUserUpdate(): ?string
    {
        return $this->user_update;
    }

    public function setUserUpdate(?string $user_update): static
    {
        $this->user_update = $user_update;

        return $this;
    }

    public function getUserDelete(): ?string
    {
        return $this->user_delete;
    }

    public function setUserDelete(?string $user_delete): static
    {
        $this->user_delete = $user_delete;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(?\DateTimeInterface $date_create): static
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(?\DateTimeInterface $date_update): static
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getDateDelete(): ?\DateTimeInterface
    {
        return $this->date_delete;
    }

    public function setDateDelete(?\DateTimeInterface $date_delete): static
    {
        $this->date_delete = $date_delete;

        return $this;
    }

  

    public function getId(): ?int
    {
        return $this->id;
    }


   

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }



    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): static
    {
        $this->consultation = $consultation;

        return $this;
    }

    public function getPharmacien(): ?Pharmacien
    {
        return $this->pharmacien;
    }

    public function setPharmacien(?Pharmacien $pharmacien): static
    {
        $this->pharmacien = $pharmacien;

        return $this;
    }

    public function __toString()
    {
      return " ".$this->getId();
    }


}
