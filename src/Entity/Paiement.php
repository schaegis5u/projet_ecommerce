<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Carte;

    /**
     * @ORM\Column(type="integer")
     */
    private $CCV;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Expiration;

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

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getCarte(): ?string
    {
        return $this->Carte;
    }

    public function setCarte(string $Carte): self
    {
        $this->Carte = $Carte;

        return $this;
    }

    public function getCCV(): ?int
    {
        return $this->CCV;
    }

    public function setCCV(int $CCV): self
    {
        $this->CCV = $CCV;

        return $this;
    }

    public function getExpiration(): ?\DateTimeInterface
    {
        return $this->Expiration;
    }

    public function setExpiration(\DateTimeInterface $Expiration): self
    {
        $this->Expiration = $Expiration;

        return $this;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }
}
