<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=4, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=true, options={"fixed"=true})
     */
    private $cp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $ville;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEmbauche", type="date", nullable=true)
     */
    private $dateembauche;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="utilisateurs")
     */
    private $laCategorie;

    /**
     * @ORM\OneToMany(targetEntity=UtilisateurSecondaire::class, mappedBy="idUtili")
     */
    private $lesUtiliSecondaires;

    /**
     * @ORM\OneToOne(targetEntity=Compte::class, mappedBy="lUtilisateur", cascade={"persist", "remove"})
     */
    private $leCompte;



   

    public function __construct()
    {
        $this->lesUtiliSecondaires = new ArrayCollection();
    }

    
   

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

     public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    } 
    
    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(?string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDateembauche(): ?\DateTimeInterface
    {
        return $this->dateembauche;
    }

    public function setDateembauche(?\DateTimeInterface $dateembauche): self
    {
        $this->dateembauche = $dateembauche;

        return $this;
    }

    public function getLaCategorie(): ?categorie
    {
        return $this->laCategorie;
    }

    public function setLaCategorie(?categorie $laCategorie): self
    {
        $this->laCategorie = $laCategorie;

        return $this;
    }

    /**
     * @return Collection|UtilisateurSecondaire[]
     */
    public function getLesUtiliSecondaires(): Collection
    {
        return $this->lesUtiliSecondaires;
    }

    public function addLesUtiliSecondaire(UtilisateurSecondaire $lesUtiliSecondaire): self
    {
        if (!$this->lesUtiliSecondaires->contains($lesUtiliSecondaire)) {
            $this->lesUtiliSecondaires[] = $lesUtiliSecondaire;
            $lesUtiliSecondaire->setIdUtili($this);
        }

        return $this;
    }

    public function removeLesUtiliSecondaire(UtilisateurSecondaire $lesUtiliSecondaire): self
    {
        if ($this->lesUtiliSecondaires->removeElement($lesUtiliSecondaire)) {
            // set the owning side to null (unless already changed)
            if ($lesUtiliSecondaire->getIdUtili() === $this) {
                $lesUtiliSecondaire->setIdUtili(null);
            }
        }

        return $this;
    }

    public function getLeCompte(): ?Compte
    {
        return $this->leCompte;
    }

    public function setLeCompte(?Compte $leCompte): self
    {
        // unset the owning side of the relation if necessary
        if ($leCompte === null && $this->leCompte !== null) {
            $this->leCompte->setLUtilisateur(null);
        }

        // set the owning side of the relation if necessary
        if ($leCompte !== null && $leCompte->getLUtilisateur() !== $this) {
            $leCompte->setLUtilisateur($this);
        }

        $this->leCompte = $leCompte;

        return $this;
    }
    
    public function getNomprenom()
        {
            return $this->nom." ".$this->prenom;
    
        }

   


    
    

  
   
    
    


}
