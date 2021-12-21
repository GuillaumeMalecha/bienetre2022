<?php

namespace App\Entity;

use App\Repository\NewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsletterRepository::class)
 */
class Newsletter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $publication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="blob")
     */
    private $documentpdf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublication(): ?\DateTimeInterface
    {
        return $this->publication;
    }

    public function setPublication(\DateTimeInterface $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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
}
