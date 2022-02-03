<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
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
    private $Description;

    /**
     * @ORM\Column(type="blob")
     */
    private $documentpdf;

    /**
     * @ORM\Column(type="date")
     */
    private $debut;

    /**
     * @ORM\Column(type="date")
     */
    private $fin;

    /**
     * @ORM\Column(type="date")
     */
    private $affichagede;

    /**
     * @ORM\Column(type="date")
     */
    private $affichagejusque;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataire::class, inversedBy="Promotion")
     */
    private $Prestataire;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieDeServices::class, inversedBy="Promotion")
     */
    private $CategorieDeServices;

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
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDocumentpdf()
    {
        return $this->documentpdf;
    }

    public function setDocumentpdf($documentpdf): self
    {
        $this->documentpdf = $documentpdf;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getAffichagede(): ?\DateTimeInterface
    {
        return $this->affichagede;
    }

    public function setAffichagede(\DateTimeInterface $affichagede): self
    {
        $this->affichagede = $affichagede;

        return $this;
    }

    public function getAffichagejusque(): ?\DateTimeInterface
    {
        return $this->affichagejusque;
    }

    public function setAffichagejusque(\DateTimeInterface $affichagejusque): self
    {
        $this->affichagejusque = $affichagejusque;

        return $this;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->Prestataire;
    }

    public function setPrestataire(?Prestataire $Prestataire): self
    {
        $this->Prestataire = $Prestataire;

        return $this;
    }

    public function getCategorieDeServices(): ?CategorieDeServices
    {
        return $this->CategorieDeServices;
    }

    public function setCategorieDeServices(?CategorieDeServices $CategorieDeServices): self
    {
        $this->CategorieDeServices = $CategorieDeServices;

        return $this;
    }
}
