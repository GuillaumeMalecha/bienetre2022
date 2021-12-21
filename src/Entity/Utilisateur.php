<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
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
}
