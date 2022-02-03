<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordre;

    /**
     * @ORM\Column(type="blob")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataire::class, inversedBy="Images")
     */
    private $Prestataire;

    /**
     * @ORM\OneToOne(targetEntity=CategorieDeServices::class, mappedBy="Images", cascade={"persist", "remove"})
     */
    private $CategorieDeServices;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

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
        // unset the owning side of the relation if necessary
        if ($CategorieDeServices === null && $this->CategorieDeServices !== null) {
            $this->CategorieDeServices->setImages(null);
        }

        // set the owning side of the relation if necessary
        if ($CategorieDeServices !== null && $CategorieDeServices->getImages() !== $this) {
            $CategorieDeServices->setImages($this);
        }

        $this->CategorieDeServices = $CategorieDeServices;

        return $this;
    }
}
