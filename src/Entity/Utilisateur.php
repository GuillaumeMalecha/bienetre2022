<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motdepasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressenum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresserue;

    /**
     * @ORM\Column(type="date")
     */
    private $inscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeutilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbessaisinfructueux;

    /**
     * @ORM\Column(type="boolean")
     */
    private $banni;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inscriptconf;

    /**
     * @ORM\OneToMany(targetEntity=Internaute::class, mappedBy="Utilisateur")
     */
    private $Internaute;

    /**
     * @ORM\OneToMany(targetEntity=Prestataire::class, mappedBy="Utilisateur")
     */
    private $Prestataire;

    /**
     * @ORM\ManyToOne(targetEntity=CodePostal::class, inversedBy="Utilisateur")
     */
    private $CodePostal;

    /**
     * @ORM\ManyToOne(targetEntity=Localite::class, inversedBy="Utilisateur")
     */
    private $Localite;

    /**
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="Utilisateur")
     */
    private $Commune;

    public function __construct()
    {
        $this->Internaute = new ArrayCollection();
        $this->Prestataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getAdressenum(): ?string
    {
        return $this->adressenum;
    }

    public function setAdressenum(string $adressenum): self
    {
        $this->adressenum = $adressenum;

        return $this;
    }

    public function getAdresserue(): ?string
    {
        return $this->adresserue;
    }

    public function setAdresserue(string $adresserue): self
    {
        $this->adresserue = $adresserue;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getTypeutilisateur(): ?string
    {
        return $this->typeutilisateur;
    }

    public function setTypeutilisateur(string $typeutilisateur): self
    {
        $this->typeutilisateur = $typeutilisateur;

        return $this;
    }

    public function getNbessaisinfructueux(): ?int
    {
        return $this->nbessaisinfructueux;
    }

    public function setNbessaisinfructueux(int $nbessaisinfructueux): self
    {
        $this->nbessaisinfructueux = $nbessaisinfructueux;

        return $this;
    }

    public function getBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(bool $banni): self
    {
        $this->banni = $banni;

        return $this;
    }

    public function getInscriptconf(): ?bool
    {
        return $this->inscriptconf;
    }

    public function setInscriptconf(bool $inscriptconf): self
    {
        $this->inscriptconf = $inscriptconf;

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
            $internaute->setUtilisateur($this);
        }

        return $this;
    }

    public function removeInternaute(Internaute $internaute): self
    {
        if ($this->Internaute->removeElement($internaute)) {
            // set the owning side to null (unless already changed)
            if ($internaute->getUtilisateur() === $this) {
                $internaute->setUtilisateur(null);
            }
        }

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
            $prestataire->setUtilisateur($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->Prestataire->removeElement($prestataire)) {
            // set the owning side to null (unless already changed)
            if ($prestataire->getUtilisateur() === $this) {
                $prestataire->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getCodePostal(): ?CodePostal
    {
        return $this->CodePostal;
    }

    public function setCodePostal(?CodePostal $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getLocalite(): ?Localite
    {
        return $this->Localite;
    }

    public function setLocalite(?Localite $Localite): self
    {
        $this->Localite = $Localite;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->Commune;
    }

    public function setCommune(?Commune $Commune): self
    {
        $this->Commune = $Commune;

        return $this;
    }
}
