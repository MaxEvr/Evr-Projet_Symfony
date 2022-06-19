<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignefraisforfait
 *
 * @ORM\Table(name="lignefraisforfait", indexes={@ORM\Index(name="idFiche", columns={"idFiche"}), @ORM\Index(name="idFraisForfait", columns={"idFraisForfait"})})
 * @ORM\Entity(repositoryClass="App\Repository\LigneFraisForfaitRepository")
 */
class Lignefraisforfait
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
     * @var int|null
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var \Fraisforfait
     *
     * @ORM\ManyToOne(targetEntity="Fraisforfait")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFraisForfait", referencedColumnName="id")
     * })
     */
    private $idfraisforfait;

    /**
     * @var \Fichefrais
     *
     * @ORM\ManyToOne(targetEntity="Fichefrais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFiche", referencedColumnName="id")
     * })
     */
    private $idfiche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIdfraisforfait(): ?Fraisforfait
    {
        return $this->idfraisforfait;
    }

    public function setIdfraisforfait(?Fraisforfait $idfraisforfait): self
    {
        $this->idfraisforfait = $idfraisforfait;

        return $this;
    }

    public function getIdfiche(): ?Fichefrais
    {
        return $this->idfiche;
    }

    public function setIdfiche(?Fichefrais $idfiche): self
    {
        $this->idfiche = $idfiche;

        return $this;
    }


}
