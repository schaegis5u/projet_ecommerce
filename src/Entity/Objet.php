<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ObjetRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjetRepository")
 */
class Objet
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Marque;

    /**
     * @ORM\Column(type="float")
     */
    private $Prix;


    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Categories::class, inversedBy="objets")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="objets")
     */
    private $panier;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="objets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(?string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addObjet($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeObjet($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Nom;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
