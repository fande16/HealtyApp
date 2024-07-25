<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
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

    #[ORM\Column(length: 255)]
    private ?string $motif = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $resultat = null;

   


    #[ORM\ManyToOne(inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;


    #[ORM\Column(length: 255)]
    private ?string $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $Taille = null;

    #[ORM\Column(length: 255)]
    private ?string $Temperature = null;

    #[ORM\Column(length: 255)]
    private ?string $Fréquence_cardiaque = null;

    #[ORM\Column(length: 255)]
    private ?string $Tension = null;

    #[ORM\Column(length: 255)]
    private ?string $Fréquence_respiratoire = null;

    #[ORM\Column(length: 255)]
    private ?string $Diurese = null;

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

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(string $resultat): static
    {
        $this->resultat = $resultat;

        return $this;
    }


 
    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecin $medecin): static
    {
        $this->medecin = $medecin;

        return $this;
    }


    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->Taille;
    }

    public function setTaille(string $Taille): static
    {
        $this->Taille = $Taille;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->Temperature;
    }

    public function setTemperature(string $Temperature): static
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getFréquenceCardiaque(): ?string
    {
        return $this->Fréquence_cardiaque;
    }

    public function setFréquenceCardiaque(string $Fréquence_cardiaque): static
    {
        $this->Fréquence_cardiaque = $Fréquence_cardiaque;

        return $this;
    }

    public function getTension(): ?string
    {
        return $this->Tension;
    }

    public function setTension(string $Tension): static
    {
        $this->Tension = $Tension;

        return $this;
    }

    public function getFréquenceRespiratoire(): ?string
    {
        return $this->Fréquence_respiratoire;
    }

    public function setFréquenceRespiratoire(string $Fréquence_respiratoire): static
    {
        $this->Fréquence_respiratoire = $Fréquence_respiratoire;

        return $this;
    }

    public function getDiurese(): ?string
    {
        return $this->Diurese;
    }

    public function setDiurese(string $Diurese): static
    {
        $this->Diurese = $Diurese;

        return $this;
    }

    public function __toString()
    {
      return "".$this->getid()." ".$this->getdate()." ".$this->getMotif();
    }

   
}
