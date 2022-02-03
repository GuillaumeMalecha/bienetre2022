<?php

namespace App\Entity;

use App\Repository\CategorieDeServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieDeServicesRepository::class)
 */
class CategorieDeServices
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enavant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valide;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataire::class, mappedBy="CategorieDeServices")
     */
    private $Prestataire;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="CategorieDeServices")
     */
    private $Promotion;

    /**
     * @ORM\OneToOne(targetEntity=Images::class, inversedBy="CategorieDeServices", cascade={"persist", "remove"})
     */
    private $Images;

    public function __construct()
    {
        $this->Prestataire = new ArrayCollection();
        $this->Promotion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEnavant(): ?bool
    {
        return $this->enavant;
    }

    public function setEnavant(bool $enavant): self
    {
        $this->enavant = $enavant;

        return $this;
    }

    public function getValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * @return Collection|Prestataire[]
     */
    public function getPrestataire(): Collection
    {
        return $this->Prestataire;
    }

    public function addPrestataire(Prestataire $prestataire): self
    {
        if (!$this->Prestataire->contains($prestataire)) {
            $this->Prestataire[] = $prestataire;
            $prestataire->addCategorieDeService($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->Prestataire->removeElement($prestataire)) {
            $prestataire->removeCategorieDeService($this);
        }

        return $this;
    }

    /**
     * @return Collection|Promotion[]
     */
    public function getPromotion(): Collection
    {
        return $this->Promotion;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->Promotion->contains($promotion)) {
            $this->Promotion[] = $promotion;
            $promotion->setCategorieDeServices($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->Promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getCategorieDeServices() === $this) {
                $promotion->setCategorieDeServices(null);
            }
        }

        return $this;
    }

    public function getImages(): ?Images
    {
        return $this->Images;
    }

    public function setImages(?Images $Images): self
    {
        $this->Images = $Images;

        return $this;
    }
}
