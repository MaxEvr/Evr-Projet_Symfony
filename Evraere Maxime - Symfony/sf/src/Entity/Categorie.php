<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="laCategorie")
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToMany(targetEntity=Domaine::class, inversedBy="categories")
     */
    private $leDomaine;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->leDomaine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setLaCategorie($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getLaCategorie() === $this) {
                $utilisateur->setLaCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Domaine[]
     */
    public function getLeDomaine(): Collection
    {
        return $this->leDomaine;
    }

    public function addLeDomaine(Domaine $leDomaine): self
    {
        if (!$this->leDomaine->contains($leDomaine)) {
            $this->leDomaine[] = $leDomaine;
        }

        return $this;
    }

    public function removeLeDomaine(Domaine $leDomaine): self
    {
        $this->leDomaine->removeElement($leDomaine);

        return $this;
    }
}
