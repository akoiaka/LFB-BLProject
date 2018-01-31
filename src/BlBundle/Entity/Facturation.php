<?php
namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\BonslivraisonRepository;

namespace BlBundle\Entity;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BlBundle\Repository\FacturationRepository")
 * Facturation
 */
class Facturation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $numFact;

    /**
     * @var \DateTime $url
     *
     * @ORM\Column(name="factDate", type="datetime", nullable=true)
     */
    private $factDate;

    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string", nullable=true)
     */

    private $clientFact;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseFact", type="string", nullable=true)
     */
    private $adresseFact;

    /**
     * @var string
     *
     * @ORM\Column(name="complAdresseFact", type="string", nullable=true)
     */
    private $complAdresseFact;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostFact", type="int", nullable=true)
     */
    private $codePostFact;

    /**
     * @var string
     *
     * @ORM\Column(name="villeFact", type="string", nullable=true)
     */
    private $villeFact;

    /**
     * @var string
     *
     * @ORM\Column(name="paysFact", type="string", nullable=true)
     */
    private $paysFact;

    /**
     * @var string
     *
     * @ORM\Column(name="refFact", type="string", nullable=true)
     */
    private $refFact;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteFact", type="int", nullable=true)
     */
    private $quantiteFact;

    /**
     * @var string
     *
     * @ORM\Column(name="pUFact", type="string", nullable=true)
     */
    private $pUFact;

    /**
     * @var decimal
     *
     * @ORM\Column(name="prixhtFact", type="decimal", nullable=true)
     */
    private $prixhtFact;

    /**
     * @var decimal
     *
     * @ORM\Column(name="totalhtFact", type="decimal", nullable=true)
     */
    private $totalhtFact;

    /**
     * @var decimal
     *
     * @ORM\Column(name="totaltvaFact", type="decimal", nullable=true)
     */
    private $totaltvaFact;

    /**
     * @var decimal
     *
     * @ORM\Column(name="totalttcFact", type="decimal", nullable=true)
     */
    private $totalttcFact;

    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set numFact
     *
     * @param string $numFact
     *
     * @return Facturation
     */
    public function setNumFact($numFact)
    {
        $this->numFact = $numFact;

        return $this;
    }

    /**
     * Get numFact
     *
     * @return string
     */
    public function getNumFact()
    {
        return $this->numFact;
    }

    /**
     * Set factDate
     *
     * @param \DateTime $factDate
     *
     * @return Facturation
     */
    public function setFactDate($factDate)
    {
        $this->factDate = $factDate;

        return $this;
    }

    /**
     * Get factDate
     *
     * @return \DateTime
     */
    public function getFactDate()
    {
        return $this->factDate;
    }

    /**
     * Set clientFact
     *
     * @param string $clientFact
     *
     * @return Facturation
     */
    public function setClientFact($clientFact)
    {
        $this->clientFact = $clientFact;

        return $this;
    }

    /**
     * Get clientFact
     *
     * @return string
     */
    public function getClientFact()
    {
        return $this->clientFact;
    }

    /**
     * Set adresseFact
     *
     * @param string $adresseFact
     *
     * @return Facturation
     */
    public function setAdresseFact($adresseFact)
    {
        $this->adresseFact = $adresseFact;

        return $this;
    }

    /**
     * Get adresseFact
     *
     * @return string
     */
    public function getAdresseFact()
    {
        return $this->adresseFact;
    }

    /**
     * Set complAdresseFact
     *
     * @param string $complAdresseFact
     *
     * @return Facturation
     */
    public function setComplAdresseFact($complAdresseFact)
    {
        $this->complAdresseFact = $complAdresseFact;

        return $this;
    }

    /**
     * Get complAdresseFact
     *
     * @return string
     */
    public function getComplAdresseFact()
    {
        return $this->complAdresseFact;
    }

    /**
     * Set codePostFact
     *
     * @param integer $codePostFact
     *
     * @return Facturation
     */
    public function setCodePostFact($codePostFact)
    {
        $this->codePostFact = $codePostFact;

        return $this;
    }

    /**
     * Get codePostFact
     *
     * @return int
     */
    public function getCodePostFact()
    {
        return $this->codePostFact;
    }

    /**
     * Set villeFact
     *
     * @param string $villeFact
     *
     * @return Facturation
     */
    public function setVilleFact($villeFact)
    {
        $this->villeFact = $villeFact;

        return $this;
    }

    /**
     * Get villeFact
     *
     * @return string
     */
    public function getVilleFact()
    {
        return $this->villeFact;
    }

    /**
     * Set paysFact
     *
     * @param string $paysFact
     *
     * @return Facturation
     */
    public function setPaysFact($paysFact)
    {
        $this->paysFact = $paysFact;

        return $this;
    }

    /**
     * Get paysFact
     *
     * @return string
     */
    public function getPaysFact()
    {
        return $this->paysFact;
    }

    /**
     * Set refFact
     *
     * @param string $refFact
     *
     * @return Facturation
     */
    public function setRefFact($refFact)
    {
        $this->refFact = $refFact;

        return $this;
    }

    /**
     * Get refFact
     *
     * @return string
     */
    public function getRefFact()
    {
        return $this->refFact;
    }

    /**
     * Set quantiteFact
     *
     * @param integer $quantiteFact
     *
     * @return Facturation
     */
    public function setQuantiteFact($quantiteFact)
    {
        $this->quantiteFact = $quantiteFact;

        return $this;
    }

    /**
     * Get quantiteFact
     *
     * @return int
     */
    public function getQuantiteFact()
    {
        return $this->quantiteFact;
    }

    /**
     * Set pUFact
     *
     * @param string $pUFact
     *
     * @return Facturation
     */
    public function setPUFact($pUFact)
    {
        $this->pUFact = $pUFact;

        return $this;
    }

    /**
     * Get pUFact
     *
     * @return string
     */
    public function getPUFact()
    {
        return $this->pUFact;
    }

    /**
     * Set prixhtFact
     *
     * @param string $prixhtFact
     *
     * @return Facturation
     */
    public function setPrixhtFact($prixhtFact)
    {
        $this->prixhtFact = $prixhtFact;

        return $this;
    }

    /**
     * Get prixhtFact
     *
     * @return string
     */
    public function getPrixhtFact()
    {
        return $this->prixhtFact;
    }

    /**
     * Set totalhtFact
     *
     * @param string $totalhtFact
     *
     * @return Facturation
     */
    public function setTotalhtFact($totalhtFact)
    {
        $this->totalhtFact = $totalhtFact;

        return $this;
    }

    /**
     * Get totalhtFact
     *
     * @return string
     */
    public function getTotalhtFact()
    {
        return $this->totalhtFact;
    }

    /**
     * Set totaltvaFact
     *
     * @param string $totaltvaFact
     *
     * @return Facturation
     */
    public function setTotaltvaFact($totaltvaFact)
    {
        $this->totaltvaFact = $totaltvaFact;

        return $this;
    }

    /**
     * Get totaltvaFact
     *
     * @return string
     */
    public function getTotaltvaFact()
    {
        return $this->totaltvaFact;
    }

    /**
     * Set totalttcFact
     *
     * @param string $totalttcFact
     *
     * @return Facturation
     */
    public function setTotalttcFact($totalttcFact)
    {
        $this->totalttcFact = $totalttcFact;

        return $this;
    }

    /**
     * Get totalttcFact
     *
     * @return string
     */
    public function getTotalttcFact()
    {
        return $this->totalttcFact;
    }
}

