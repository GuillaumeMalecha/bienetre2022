<?php

namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestataireRepository::class)
 */
class Prestataire
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
    private $siteinternet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numtel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numtva;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Prestataire")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=Internaute::class, mappedBy="Prestataire")
     */
    private $Internaute;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Prestataire")
     */
    private $Utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="Prestataire")
     */
    private $Images;

    /**
     * @ORM\ManyToMany(targetEntity=CategorieDeServices::class, inversedBy="Prestataire")
     */
    private $CategorieDeServices;

    /**
     * @ORM\OneToMany(targetEntity=Stage::class, mappedBy="Prestataire")
     */
    private $Stage;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="Prestataire")
     */
    private $Promotion;

    public function __construct()
    {
        $this->Commentaire = new ArrayCollection();
        $this->Internaute = new ArrayCollection();
        $this->Images = new ArrayCollection();
        $this->CategorieDeServices = new ArrayCollection();
        $this->Stage = new ArrayCollection();
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

    public function getSiteinternet(): ?string
    {
        return $this->siteinternet;
    }

    public function setSiteinternet(string $siteinternet): self
    {
        $this->siteinternet = $siteinternet;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getNumtva(): ?string
    {
        return $this->numtva;
    }

    public function setNumtva(string $numtva): self
    {
        $this->numtva = $numtva;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->Commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->Commentaire->contains($commentaire)) {
            $this->Commentaire[] = $commentaire;
            $commentaire->setPrestataire($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPrestataire() === $this) {
                $commentaire->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Internaute[]
     */
    public function getInternaute(): Collection
    {
        return $this->Internaute;
    }

    public function addInternaute(Internaute $internaute): self
    {
        if (!$this->Internaute->contains($internaute)) {
            $this->Internaute[] = $internaute;
            $internaute->addPrestataire($this);
        }

        return $this;
    }

    public function removeInternaute(Internaute $internaute): self
    {
        if ($this->Internaute->removeElement($internaute)) {
            $internaute->removePrestataire($this);
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->Images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->Images->contains($image)) {
            $this->Images[] = $image;
            $image->setPrestataire($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->Images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPrestataire() === $this) {
                $image->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CategorieDeServices[]
     */
    public function getCategorieDeServices(): Collection
    {
        return $this->CategorieDeServices;
    }

    public function addCategorieDeService(CategorieDeServices $categorieDeService): self
    {
        if (!$this->CategorieDeServices->contains($categorieDeService)) {
            $this->CategorieDeServices[] = $categorieDeService;
        }

        return $this;
    }

    public function removeCategorieDeService(CategorieDeServices $categorieDeService): self
    {
        $this->CategorieDeServices->removeElement($categorieDeService);

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStage(): Collection
    {
        return $this->Stage;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->Stage->contains($stage)) {
            $this->Stage[] = $stage;
            $stage->setPrestataire($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->Stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getPrestataire() === $this) {
                $stage->setPrestataire(null);
            }
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
            $promotion->setPrestataire($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->Promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getPrestataire() === $this) {
                $promotion->setPrestataire(null);
            }
        }

        return $this;
    }
}
