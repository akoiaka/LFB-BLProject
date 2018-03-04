<?php

namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\BonslivraisonRepository;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Facture
 */
class Facture
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
     * @var int
     */
    private $numeroF;

    /**
     * @var \DateTime
     */
    private $dateF;

    /**
     * @var string
     */
    private $referenceF;

    /**
     * @var string
     */
    private $designationF;

    /**
     * @var int
     */
    private $quantite1F;

    /**
     * @var int
     */
    private $quantite2F;

    /**
     * @var int
     */
    private $quantite3F;

    /**
     * @var string
     */
    private $puHt1;

    /**
     * @var string
     */
    private $puHt2;

    /**
     * @var string
     */
    private $puHt3;

    /**
     * @var string
     */
    private $montantHt1;

    /**
     * @var string
     */
    private $montantHt2;

    /**
     * @var string
     */
    private $montantHt3;

    /**
     * @var string
     */
    private $tvaF;

    /**
     * @var string
     */
    private $totalHtF;

    /**
     * @var string
     */
    private $totalttcF;


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
     * Set numeroF
     *
     * @param integer $numeroF
     *
     * @return Facture
     */
    public function setNumeroF($numeroF)
    {
        $this->numeroF = $numeroF;

        return $this;
    }

    /**
     * Get numeroF
     *
     * @return int
     */
    public function getNumeroF()
    {
        return $this->numeroF;
    }

    /**
     * Set dateF
     *
     * @param \DateTime $dateF
     *
     * @return Facture
     */
    public function setDateF($dateF)
    {
        $this->dateF = $dateF;

        return $this;
    }

    /**
     * Get dateF
     *
     * @return \DateTime
     */
    public function getDateF()
    {
        return $this->dateF;
    }

    /**
     * Set referenceF
     *
     * @param string $referenceF
     *
     * @return Facture
     */
    public function setReferenceF($referenceF)
    {
        $this->referenceF = $referenceF;

        return $this;
    }

    /**
     * Get referenceF
     *
     * @return string
     */
    public function getReferenceF()
    {
        return $this->referenceF;
    }

    /**
     * Set designationF
     *
     * @param string $designationF
     *
     * @return Facture
     */
    public function setDesignationF($designationF)
    {
        $this->designationF = $designationF;

        return $this;
    }

    /**
     * Get designationF
     *
     * @return string
     */
    public function getDesignationF()
    {
        return $this->designationF;
    }

    /**
     * Set quantite1F
     *
     * @param integer $quantite1F
     *
     * @return Facture
     */
    public function setQuantite1F($quantite1F)
    {
        $this->quantite1F = $quantite1F;

        return $this;
    }

    /**
     * Get quantite1F
     *
     * @return int
     */
    public function getQuantite1F()
    {
        return $this->quantite1F;
    }

    /**
     * Set quantite2F
     *
     * @param integer $quantite2F
     *
     * @return Facture
     */
    public function setQuantite2F($quantite2F)
    {
        $this->quantite2F = $quantite2F;

        return $this;
    }

    /**
     * Get quantite2F
     *
     * @return int
     */
    public function getQuantite2F()
    {
        return $this->quantite2F;
    }

    /**
     * Set quantite3F
     *
     * @param integer $quantite3F
     *
     * @return Facture
     */
    public function setQuantite3F($quantite3F)
    {
        $this->quantite3F = $quantite3F;

        return $this;
    }

    /**
     * Get quantite3F
     *
     * @return int
     */
    public function getQuantite3F()
    {
        return $this->quantite3F;
    }

    /**
     * Set puHt1
     *
     * @param string $puHt1
     *
     * @return Facture
     */
    public function setPuHt1($puHt1)
    {
        $this->puHt1 = $puHt1;

        return $this;
    }

    /**
     * Get puHt1
     *
     * @return string
     */
    public function getPuHt1()
    {
        return $this->puHt1;
    }

    /**
     * Set puHt2
     *
     * @param string $puHt2
     *
     * @return Facture
     */
    public function setPuHt2($puHt2)
    {
        $this->puHt2 = $puHt2;

        return $this;
    }

    /**
     * Get puHt2
     *
     * @return string
     */
    public function getPuHt2()
    {
        return $this->puHt2;
    }

    /**
     * Set puHt3
     *
     * @param string $puHt3
     *
     * @return Facture
     */
    public function setPuHt3($puHt3)
    {
        $this->puHt3 = $puHt3;

        return $this;
    }

    /**
     * Get puHt3
     *
     * @return string
     */
    public function getPuHt3()
    {
        return $this->puHt3;
    }

    /**
     * Set montantHt1
     *
     * @param string $montantHt1
     *
     * @return Facture
     */
    public function setMontantHt1($montantHt1)
    {
        $this->montantHt1 = $montantHt1;

        return $this;
    }

    /**
     * Get montantHt1
     *
     * @return string
     */
    public function getMontantHt1()
    {
        return $this->montantHt1;
    }

    /**
     * Set montantHt2
     *
     * @param string $montantHt2
     *
     * @return Facture
     */
    public function setMontantHt2($montantHt2)
    {
        $this->montantHt2 = $montantHt2;

        return $this;
    }

    /**
     * Get montantHt2
     *
     * @return string
     */
    public function getMontantHt2()
    {
        return $this->montantHt2;
    }

    /**
     * Set montantHt3
     *
     * @param string $montantHt3
     *
     * @return Facture
     */
    public function setMontantHt3($montantHt3)
    {
        $this->montantHt3 = $montantHt3;

        return $this;
    }

    /**
     * Get montantHt3
     *
     * @return string
     */
    public function getMontantHt3()
    {
        return $this->montantHt3;
    }

    /**
     * Set tvaF
     *
     * @param string $tvaF
     *
     * @return Facture
     */
    public function setTvaF($tvaF)
    {
        $this->tvaF = $tvaF;

        return $this;
    }

    /**
     * Get tvaF
     *
     * @return string
     */
    public function getTvaF()
    {
        return $this->tvaF;
    }

    /**
     * Set totalHtF
     *
     * @param string $totalHtF
     *
     * @return Facture
     */
    public function setTotalHtF($totalHtF)
    {
        $this->totalHtF = $totalHtF;

        return $this;
    }

    /**
     * Get totalHtF
     *
     * @return string
     */
    public function getTotalHtF()
    {
        return $this->totalHtF;
    }

    /**
     * Set totalttcF
     *
     * @param string $totalttcF
     *
     * @return Facture
     */
    public function setTotalttcF($totalttcF)
    {
        $this->totalttcF = $totalttcF;

        return $this;
    }

    /**
     * Get totalttcF
     *
     * @return string
     */
    public function getTotalttcF()
    {
        return $this->totalttcF;
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
