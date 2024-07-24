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

    /**
     * @var Collection<int, ExamenClinique>
     */
    #[ORM\OneToMany(targetEntity: ExamenClinique::class, mappedBy: 'consultation')]
    private Collection $examenCliniques;

    #[ORM\ManyToOne(inversedBy: 'consultations')]
    private ?Patient $patient = null;

    #[ORM\ManyToOne(inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    /**
     * @var Collection<int, Hospitalisation>
     */
    #[ORM\OneToMany(targetEntity: Hospitalisation::class, mappedBy: 'consultation')]
    private Collection $hospitalisations;

    /**
     * @var Collection<int, Facturation>
     */
    #[ORM\OneToMany(targetEntity: Facturation::class, mappedBy: 'consultation')]
    private Collection $facturations;

    /**
     * @var Collection<int, Prescription>
     */
    #[ORM\OneToMany(targetEntity: Prescription::class, mappedBy: 'consultation')]
    private Collection $prescriptions;

    /**
     * @var Collection<int, Rdv>
     */
    #[ORM\OneToMany(targetEntity: Rdv::class, mappedBy: 'consultation')]
    private Collection $rdvs;

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

    public function __construct()
    {
        $this->examenCliniques = new ArrayCollection();
        $this->hospitalisations = new ArrayCollection();
        $this->facturations = new ArrayCollection();
        $this->prescriptions = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
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

    /**
     * @return Collection<int, ExamenClinique>
     */
    public function getExamenCliniques(): Collection
    {
        return $this->examenCliniques;
    }

    public function addExamenClinique(ExamenClinique $examenClinique): static
    {
        if (!$this->examenCliniques->contains($examenClinique)) {
            $this->examenCliniques->add($examenClinique);
            $examenClinique->setConsultation($this);
        }

        return $this;
    }

    public function removeExamenClinique(ExamenClinique $examenClinique): static
    {
        if ($this->examenCliniques->removeElement($examenClinique)) {
            // set the owning side to null (unless already changed)
            if ($examenClinique->getConsultation() === $this) {
                $examenClinique->setConsultation(null);
            }
        }

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

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

    /**
     * @return Collection<int, Hospitalisation>
     */
    public function getHospitalisations(): Collection
    {
        return $this->hospitalisations;
    }

    public function addHospitalisation(Hospitalisation $hospitalisation): static
    {
        if (!$this->hospitalisations->contains($hospitalisation)) {
            $this->hospitalisations->add($hospitalisation);
            $hospitalisation->setConsultation($this);
        }

        return $this;
    }

    public function removeHospitalisation(Hospitalisation $hospitalisation): static
    {
        if ($this->hospitalisations->removeElement($hospitalisation)) {
            // set the owning side to null (unless already changed)
            if ($hospitalisation->getConsultation() === $this) {
                $hospitalisation->setConsultation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Facturation>
     */
    public function getFacturations(): Collection
    {
        return $this->facturations;
    }

    public function addFacturation(Facturation $facturation): static
    {
        if (!$this->facturations->contains($facturation)) {
            $this->facturations->add($facturation);
            $facturation->setConsultation($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): static
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getConsultation() === $this) {
                $facturation->setConsultation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prescription>
     */
    public function getPrescriptions(): Collection
    {
        return $this->prescriptions;
    }

    public function addPrescription(Prescription $prescription): static
    {
        if (!$this->prescriptions->contains($prescription)) {
            $this->prescriptions->add($prescription);
            $prescription->setConsultation($this);
        }

        return $this;
    }

    public function removePrescription(Prescription $prescription): static
    {
        if ($this->prescriptions->removeElement($prescription)) {
            // set the owning side to null (unless already changed)
            if ($prescription->getConsultation() === $this) {
                $prescription->setConsultation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rdv>
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
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

    public function addRdv(Rdv $rdv): static
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs->add($rdv);
            $rdv->setConsultation($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): static
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getConsultation() === $this) {
                $rdv->setConsultation(null);
            }
        }

        return $this;
    }

 
}
