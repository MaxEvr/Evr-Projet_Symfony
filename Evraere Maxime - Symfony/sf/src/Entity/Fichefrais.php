<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fichefrais
 *
 * @ORM\Table(name="fichefrais", uniqueConstraints={@ORM\UniqueConstraint(name="unefiche", columns={"idUtilisateur", "mois"})}, indexes={@ORM\Index(name="idEtat", columns={"idEtat"}), @ORM\Index(name="IDX_92D5AB085D419CCB", columns={"idUtilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\FicheFraisRepository")
 */
class Fichefrais
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=6, nullable=false, options={"fixed"=true})
     */
    private $mois;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbJustificatifs", type="integer", nullable=true)
     */
    private $nbjustificatifs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="montantValide", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montantvalide;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateModif", type="date", nullable=true)
     */
    private $datemodif;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEtat", referencedColumnName="id")
     * })
     */
    private $idetat;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
     * })
     */
    private $idutilisateur;

    /**
     * @ORM\OneToMany(targetEntity=UtilisateurSecondaire::class, mappedBy="idFicheFrais")
     */
    private $lesFicheFraisSec;

  


  

    public function __construct()
    {
        $this->lesFicheFraisSec = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getNbjustificatifs(): ?int
    {
        return $this->nbjustificatifs;
    }

    public function setNbjustificatifs(?int $nbjustificatifs): self
    {
        $this->nbjustificatifs = $nbjustificatifs;

        return $this;
    }

    public function getMontantvalide(): ?string
    {
        return $this->montantvalide;
    }

    public function setMontantvalide(?string $montantvalide): self
    {
        $this->montantvalide = $montantvalide;

        return $this;
    }

    public function getDatemodif(): ?\DateTimeInterface
    {
        return $this->datemodif;
    }

    public function setDatemodif(?\DateTimeInterface $datemodif): self
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    public function getIdetat(): ?Etat
    {
        return $this->idetat;
    }

    public function setIdetat(?Etat $idetat): self
    {
        $this->idetat = $idetat;

        return $this;
    }

    public function getIdutilisateur(): ?Utilisateur
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(?Utilisateur $idutilisateur): self
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * @return Collection|UtilisateurSecondaire[]
     */
    public function getLesFicheFraisSec(): Collection
    {
        return $this->lesFicheFraisSec;
    }

    public function addLesFicheFraisSec(UtilisateurSecondaire $lesFicheFraisSec): self
    {
        if (!$this->lesFicheFraisSec->contains($lesFicheFraisSec)) {
            $this->lesFicheFraisSec[] = $lesFicheFraisSec;
            $lesFicheFraisSec->setIdFicheFrais($this);
        }

        return $this;
    }

    public function removeLesFicheFraisSec(UtilisateurSecondaire $lesFicheFraisSec): self
    {
        if ($this->lesFicheFraisSec->removeElement($lesFicheFraisSec)) {
            // set the owning side to null (unless already changed)
            if ($lesFicheFraisSec->getIdFicheFrais() === $this) {
                $lesFicheFraisSec->setIdFicheFrais(null);
            }
        }

        return $this;
    }

  


    


}
