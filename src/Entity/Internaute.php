<?php

namespace App\Entity;

use App\Repository\InternauteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InternauteRepository::class)
 */
class Internaute
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
    private $prenom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newsletter;

    /**
     * @ORM\OneToMany(targetEntity=Abus::class, mappedBy="Internaute")
     */
    private $Abus;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Internaute")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=Bloc::class, inversedBy="Internaute")
     */
    private $Bloc;

    /**
     * @ORM\OneToOne(targetEntity=Images::class, cascade={"persist", "remove"})
     */
    private $Images;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Internaute")
     */
    private $Utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataire::class, inversedBy="Internaute")
     */
    private $Prestataire;

    public function __construct()
    {
        $this->Abus = new ArrayCollection();
        $this->Commentaire = new ArrayCollection();
        $this->Bloc = new ArrayCollection();
        $this->Prestataire = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * @return Collection|Abus[]
     */
    public function getAbus(): Collection
    {
        return $this->Abus;
    }

    public function addAbu(Abus $abu): self
    {
        if (!$this->Abus->contains($abu)) {
            $this->Abus[] = $abu;
            $abu->setInternaute($this);
        }

        return $this;
    }

    public function removeAbu(Abus $abu): self
    {
        if ($this->Abus->removeElement($abu)) {
            // set the owning side to null (unless already changed)
            if ($abu->getInternaute() === $this) {
                $abu->setInternaute(null);
            }
        }

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
            $commentaire->setInternaute($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getInternaute() === $this) {
                $commentaire->setInternaute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bloc[]
     */
    public function getBloc(): Collection
    {
        return $this->Bloc;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->Bloc->contains($bloc)) {
            $this->Bloc[] = $bloc;
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        $this->Bloc->removeElement($bloc);

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
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        $this->Prestataire->removeElement($prestataire);

        return $this;
    }
}
