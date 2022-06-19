<?php

namespace App\Entity;

use App\Repository\UtilisateurSecondaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurSecondaireRepository::class)
 */
class UtilisateurSecondaire
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
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="lesUtiliSecondaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtili;

    /**
     * @ORM\ManyToOne(targetEntity=Fichefrais::class, inversedBy="lesFicheFraisSec")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idFicheFrais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdUtili(): ?Utilisateur
    {
        return $this->idUtili;
    }

    public function setIdUtili(?Utilisateur $idUtili): self
    {
        $this->idUtili = $idUtili;

        return $this;
    }

    public function getIdFicheFrais(): ?Fichefrais
    {
        return $this->idFicheFrais;
    }

    public function setIdFicheFrais(?Fichefrais $idFicheFrais): self
    {
        $this->idFicheFrais = $idFicheFrais;

        return $this;
    }
}
