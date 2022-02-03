<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlocRepository::class)
 */
class Bloc
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
     * @ORM\ManyToMany(targetEntity=Internaute::class, mappedBy="Bloc")
     */
    private $Internaute;

    public function __construct()
    {
        $this->Internaute = new ArrayCollection();
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
            $internaute->addBloc($this);
        }

        return $this;
    }

    public function removeInternaute(Internaute $internaute): self
    {
        if ($this->Internaute->removeElement($internaute)) {
            $internaute->removeBloc($this);
        }

        return $this;
    }
}
