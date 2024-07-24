<?php

namespace App\Entity;

use App\Repository\CaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaisseRepository::class)]
class Caisse
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

    #[ORM\Column(length: 255)]
    private ?string $nomCaisse = null;

    /**
     * @var Collection<int, PriseService>
     */
    #[ORM\OneToMany(targetEntity: PriseService::class, mappedBy: 'caisse')]
    private Collection $priseServices;

    /**
     * @var Collection<int, Facturation>
     */
    #[ORM\OneToMany(targetEntity: Facturation::class, mappedBy: 'caisse')]
    private Collection $facturations;

    /**
     * @var Collection<int, Rdv>
     */
    #[ORM\OneToMany(targetEntity: Rdv::class, mappedBy: 'caisse')]
    private Collection $rdvs;

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
        $this->priseServices = new ArrayCollection();
        $this->facturations = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCaisse(): ?string
    {
        return $this->nomCaisse;
    }

    public function setNomCaisse(string $nomCaisse): static
    {
        $this->nomCaisse = $nomCaisse;

        return $this;
    }

    /**
     * @return Collection<int, PriseService>
     */
    public function getPriseServices(): Collection
    {
        return $this->priseServices;
    }

    public function addPriseService(PriseService $priseService): static
    {
        if (!$this->priseServices->contains($priseService)) {
            $this->priseServices->add($priseService);
            $priseService->setCaisse($this);
        }

        return $this;
    }

    public function removePriseService(PriseService $priseService): static
    {
        if ($this->priseServices->removeElement($priseService)) {
            // set the owning side to null (unless already changed)
            if ($priseService->getCaisse() === $this) {
                $priseService->setCaisse(null);
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
            $facturation->setCaisse($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): static
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getCaisse() === $this) {
                $facturation->setCaisse(null);
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

    public function addRdv(Rdv $rdv): static
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs->add($rdv);
            $rdv->setCaisse($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): static
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getCaisse() === $this) {
                $rdv->setCaisse(null);
            }
        }

        return $this;
    }

   
}
