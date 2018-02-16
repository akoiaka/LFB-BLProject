<?php

namespace BlBundle\Entity;

/**
 * @ORM\Entity
 */
class Clients
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $codeClient;

    /**
     * @var string
     */
    private $nomClient;

    /**
     * @var string
     */
    private $siret;

    /**
     * @var string
     */
    private $adresse1;

    /**
     * @var string
     */
    private $adresse2;

    /**
     * @var string
     */
    private $adresse3;

    /**
     * @var string
     */
    private $codePostal;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $pays;

    /**
     * @var string
     */
    private $adresse1Livraison;

    /**
     * @var string
     */
    private $adresse2Livraison;

    /**
     * @var string
     */
    private $adresse3Livraison;

    /**
     * @var string
     */
    private $paysLivraison;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $portable;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $compteComptable;

    /**
     * @var string
     */
    private $codeIso;

    /**
     * @var int
     */
    private $codeCEE;

    /**
     * @var int
     */
    private $numeroIso;

    /**
     * @var int
     */
    private $codeInsee;

    /**
     * @var string
     */
    private $contactClient;


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
     * Set codeClient
     *
     * @param string $codeClient
     *
     * @return Clients
     */
    public function setCodeClient($codeClient)
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    /**
     * Get codeClient
     *
     * @return string
     */
    public function getCodeClient()
    {
        return $this->codeClient;
    }

    /**
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return Clients
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    public function __toString()
    {
       return $this->getNomClient();
       return $this->getCodeClient();
       return $this->getSocieteClient();
       return $this->getVille();

    }

    /**
     * Set siret
     *
     * @param string $siret
     *
     * @return Clients
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set adresse1
     *
     * @param string $adresse1
     *
     * @return Clients
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    /**
     * Get adresse1
     *
     * @return string
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     *
     * @return Clients
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * Set adresse3
     *
     * @param string $adresse3
     *
     * @return Clients
     */
    public function setAdresse3($adresse3)
    {
        $this->adresse3 = $adresse3;

        return $this;
    }

    /**
     * Get adresse3
     *
     * @return string
     */
    public function getAdresse3()
    {
        return $this->adresse3;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Clients
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Clients
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Clients
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set adresse1Livraison
     *
     * @param string $adresse1Livraison
     *
     * @return Clients
     */
    public function setAdresse1Livraison($adresse1Livraison)
    {
        $this->adresse1Livraison = $adresse1Livraison;

        return $this;
    }

    /**
     * Get adresse1Livraison
     *
     * @return string
     */
    public function getAdresse1Livraison()
    {
        return $this->adresse1Livraison;
    }

    /**
     * Set adresse2Livraison
     *
     * @param string $adresse2Livraison
     *
     * @return Clients
     */
    public function setAdresse2Livraison($adresse2Livraison)
    {
        $this->adresse2Livraison = $adresse2Livraison;

        return $this;
    }

    /**
     * Get adresse2Livraison
     *
     * @return string
     */
    public function getAdresse2Livraison()
    {
        return $this->adresse2Livraison;
    }

    /**
     * Set adresse3Livraison
     *
     * @param string $adresse3Livraison
     *
     * @return Clients
     */
    public function setAdresse3Livraison($adresse3Livraison)
    {
        $this->adresse3Livraison = $adresse3Livraison;

        return $this;
    }

    /**
     * Get adresse3Livraison
     *
     * @return string
     */
    public function getAdresse3Livraison()
    {
        return $this->adresse3Livraison;
    }

    /**
     * Set paysLivraison
     *
     * @param string $paysLivraison
     *
     * @return Clients
     */
    public function setPaysLivraison($paysLivraison)
    {
        $this->paysLivraison = $paysLivraison;

        return $this;
    }

    /**
     * Get paysLivraison
     *
     * @return string
     */
    public function getPaysLivraison()
    {
        return $this->paysLivraison;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Clients
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set portable
     *
     * @param string $portable
     *
     * @return Clients
     */
    public function setPortable($portable)
    {
        $this->portable = $portable;

        return $this;
    }

    /**
     * Get portable
     *
     * @return string
     */
    public function getPortable()
    {
        return $this->portable;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Clients
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set compteComptable
     *
     * @param string $compteComptable
     *
     * @return Clients
     */
    public function setCompteComptable($compteComptable)
    {
        $this->compteComptable = $compteComptable;

        return $this;
    }

    /**
     * Get compteComptable
     *
     * @return string
     */
    public function getCompteComptable()
    {
        return $this->compteComptable;
    }

    /**
     * Set codeIso
     *
     * @param string $codeIso
     *
     * @return Clients
     */
    public function setCodeIso($codeIso)
    {
        $this->codeIso = $codeIso;

        return $this;
    }

    /**
     * Get codeIso
     *
     * @return string
     */
    public function getCodeIso()
    {
        return $this->codeIso;
    }

    /**
     * Set codeCEE
     *
     * @param integer $codeCEE
     *
     * @return Clients
     */
    public function setCodeCEE($codeCEE)
    {
        $this->codeCEE = $codeCEE;

        return $this;
    }

    /**
     * Get codeCEE
     *
     * @return int
     */
    public function getCodeCEE()
    {
        return $this->codeCEE;
    }

    /**
     * Set numeroIso
     *
     * @param integer $numeroIso
     *
     * @return Clients
     */
    public function setNumeroIso($numeroIso)
    {
        $this->numeroIso = $numeroIso;

        return $this;
    }

    /**
     * Get numeroIso
     *
     * @return int
     */
    public function getNumeroIso()
    {
        return $this->numeroIso;
    }

    /**
     * Set codeInsee
     *
     * @param integer $codeInsee
     *
     * @return Clients
     */
    public function setCodeInsee($codeInsee)
    {
        $this->codeInsee = $codeInsee;

        return $this;
    }

    /**
     * Get codeInsee
     *
     * @return int
     */
    public function getCodeInsee()
    {
        return $this->codeInsee;
    }

    /**
     * Set contactClient
     *
     * @param string $contactClient
     *
     * @return Clients
     */
    public function setContactClient($contactClient)
    {
        $this->contactClient = $contactClient;

        return $this;
    }

    /**
     * Get contactClient
     *
     * @return string
     */
    public function getContactClient()
    {
        return $this->contactClient;
    }
}
