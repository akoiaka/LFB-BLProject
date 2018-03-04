<?php

namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\BonslivraisonRepository;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Date;


/**
 * Factures
 */
class Factures
{
   /**
    * @ORM\ManyToMany(targetEntity="BlBundle\Entity\Clients", cascade={"persist"})
    */
    private $clients;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $numeroFacture;

    /**
     * @var \DateTime
     */
    private $dateFacture;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $designation;

    /**
     * @var int
     */
    private $quantite;

    /**
     * @var int
     */
    private $quantite2;

    /**
     * @var int
     */
    private $quantite3;


    /**
     * @var string
     */
    private $montantHt;

    /**
     * @var string
     */
    private $tva;

    /**
     * @var string
     */
    private $tauxTva;

    /**
     * @var string
     */
    private $montantTva;

    /**
     * @var string
     */
    private $totalHt;

    /**
     * @var string
     */
    private $totalTva;

    /**
     * @var string
     */
    private $puHt;

    /**
     * @var string
     */
    private $totalTtc;


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
     * Set quantite2
     *
     * @param integer $quantite2
     *
     * @return Factures
     */
    public function setQuantite2($quantite2)
    {
        $this->quantite2 = $quantite2;

        return $this;
    }

    /**
     * Get quantite2
     *
     * @return int
     */
    public function getQuantite2()
    {
        return $this->quantite2;
    }

    /**
     * Set quantite3
     *
     * @param integer $quantite3
     *
     * @return Factures
     */
    public function setQuantite3($quantite3)
    {
        $this->quantite3 = $quantite3;

        return $this;
    }

    /**
     * Get quantite3
     *
     * @return int
     */
    public function getQuantite3()
    {
        return $this->quantite3;
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

    public function __construct()
    {
        $this->date = new \DateTime();
        // $this->categories = new ArrayCollection();
        // $this->applications = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function __toString()
    {
       return $this->getNomClient();
       return $this->getCodeClient();
       return $this->getSocieteClient();
       return $this->getVille();
       return $this->getDateBl();
       return $this->getDateTime();


    }

    // Noter le singulier, on ajoute une seul client à la fois
    public function addClient(Client $client)
    {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->clients[] = $client;
        return $this;
    }

    public function removeClient(Client $client)
    {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer le client en argument
        $this->clients->removeElement($client);
    }

    // Notez le pluriel, on récupère une liste de catégories ici !
    public function getClients()
    {
        return $this->clients;
    }
}
