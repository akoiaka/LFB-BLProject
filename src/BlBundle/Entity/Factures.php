<?php

namespace BlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\FacturesRepository;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Date;


/**
 * Factures
 * @ORM\Entity
 * @ORM\Table(name="factures")
 * @ORM\Entity(repositoryClass="BlBundle\Repository\FacturesRepository")
 */
class Factures
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_facture", type="string", length=50, nullable=true)
     */
    private $numeroFacture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_facture", type="datetime")
     */
    private $dateFacture;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=100)
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_ht", type="decimal", precision=10, scale=0)
     */
    private $montantHt;

    /**
     * @var string
     *
     * @ORM\Column(name="tva", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tva;

    /**
     * @var string
     *
     * @ORM\Column(name="taux_tva", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tauxTva;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_tva", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montantTva;

    /**
     * @var string
     *
     * @ORM\Column(name="total_ht", type="decimal", precision=10, scale=0)
     */
    private $totalHt;

    /**
     * @var string
     *
     * @ORM\Column(name="total_tva", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $totalTva;

    /**
     * @var string
     *
     * @ORM\Column(name="pu_ht", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $puHt;

    /**
     * @var string
     *
     * @ORM\Column(name="total_ttc", type="decimal", precision=10, scale=0)
     */
    private $totalTtc;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->categories = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numeroFacture
     *
     * @param string $numeroFacture
     *
     * @return Factures
     */
    public function setNumeroFacture($numeroFacture)
    {
        $this->numeroFacture = $numeroFacture;

        return $this;
    }

    /**
     * Get numeroFacture
     *
     * @return string
     */
    public function getNumeroFacture()
    {
        return $this->numeroFacture;
    }

    /**
     * Set dateFacture
     *
     * @param \DateTime $dateFacture
     *
     * @return Factures
     */
    public function setDateFacture($dateFacture)
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    /**
     * Get dateFacture
     *
     * @return \DateTime
     */
    public function getDateFacture()
    {
        return $this->dateFacture;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Factures
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Factures
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Factures
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set montantHt
     *
     * @param string $montantHt
     *
     * @return Factures
     */
    public function setMontantHt($montantHt)
    {
        $this->montantHt = $montantHt;

        return $this;
    }

    /**
     * Get montantHt
     *
     * @return string
     */
    public function getMontantHt()
    {
        return $this->montantHt;
    }

    /**
     * Set tva
     *
     * @param string $tva
     *
     * @return Factures
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return string
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set tauxTva
     *
     * @param string $tauxTva
     *
     * @return Factures
     */
    public function setTauxTva($tauxTva)
    {
        $this->tauxTva = $tauxTva;

        return $this;
    }

    /**
     * Get tauxTva
     *
     * @return string
     */
    public function getTauxTva()
    {
        return $this->tauxTva;
    }

    /**
     * Set montantTva
     *
     * @param string $montantTva
     *
     * @return Factures
     */
    public function setMontantTva($montantTva)
    {
        $this->montantTva = $montantTva;

        return $this;
    }

    /**
     * Get montantTva
     *
     * @return string
     */
    public function getMontantTva()
    {
        return $this->montantTva;
    }

    /**
     * Set totalHt
     *
     * @param string $totalHt
     *
     * @return Factures
     */
    public function setTotalHt($totalHt)
    {
        $this->totalHt = $totalHt;

        return $this;
    }

    /**
     * Get totalHt
     *
     * @return string
     */
    public function getTotalHt()
    {
        return $this->totalHt;
    }

    /**
     * Set totalTva
     *
     * @param string $totalTva
     *
     * @return Factures
     */
    public function setTotalTva($totalTva)
    {
        $this->totalTva = $totalTva;

        return $this;
    }

    /**
     * Get totalTva
     *
     * @return string
     */
    public function getTotalTva()
    {
        return $this->totalTva;
    }

    /**
     * Set puHt
     *
     * @param string $puHt
     *
     * @return Factures
     */
    public function setPuHt($puHt)
    {
        $this->puHt = $puHt;

        return $this;
    }

    /**
     * Get puHt
     *
     * @return string
     */
    public function getPuHt()
    {
        return $this->puHt;
    }

    /**
     * Set totalTtc
     *
     * @param string $totalTtc
     *
     * @return Factures
     */
    public function setTotalTtc($totalTtc)
    {
        $this->totalTtc = $totalTtc;

        return $this;
    }

    /**
     * Get totalTtc
     *
     * @return string
     */
    public function getTotalTtc()
    {
        return $this->totalTtc;
    }
}
