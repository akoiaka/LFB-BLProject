<?php

namespace BlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Entity
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="BlBundle\Repository\ClientsRepository")
 */
class Clients
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
     * @ORM\Column(name="code_client", type="string", length=30, nullable=true, unique=true)
     */
    private $codeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=50)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=40, nullable=true)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="nafape", type="string", length=40)
     */
    private $nafape;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse1", type="string", length=255)
     */
    private $adresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse2", type="string", length=255, nullable=true)
     */
    private $adresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse3", type="string", length=255, nullable=true)
     */
    private $adresse3;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=50)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="societe_livraison", type="string", length=50)
     */
    private $societeLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse1_livraison", type="string", length=50)
     */
    private $adresse1Livraison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse2_livraison", type="string", length=50)
     */
    private $adresse2Livraison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse3_livraison", type="string", length=50)
     */
    private $adresse3Livraison;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postal_livraison", type="integer")
     */
    private $codePostalLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_contact", type="string", length=30, nullable=true)
     */
    private $nomContact;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_contact", type="integer", nullable=true)
     */
    private $numeroContact;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_contact", type="string", length=30, nullable=true)
     */
    private $mailContact;


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
     * Set nafape
     *
     * @param string $nafape
     *
     * @return Clients
     */
    public function setNafape($nafape)
    {
        $this->nafape = $nafape;

        return $this;
    }

    /**
     * Get nafape
     *
     * @return string
     */
    public function getNafape()
    {
        return $this->nafape;
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
     * @param integer $codePostal
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
     * @return int
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
     * Set societeLivraison
     *
     * @param string $societeLivraison
     *
     * @return Clients
     */
    public function setSocieteLivraison($societeLivraison)
    {
        $this->societeLivraison = $societeLivraison;

        return $this;
    }

    /**
     * Get societeLivraison
     *
     * @return string
     */
    public function getSocieteLivraison()
    {
        return $this->societeLivraison;
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
     * Set codePostalLivraison
     *
     * @param integer $codePostalLivraison
     *
     * @return Clients
     */
    public function setCodePostalLivraison($codePostalLivraison)
    {
        $this->codePostalLivraison = $codePostalLivraison;

        return $this;
    }

    /**
     * Get codePostalLivraison
     *
     * @return int
     */
    public function getCodePostalLivraison()
    {
        return $this->codePostalLivraison;
    }

    /**
     * Set nomContact
     *
     * @param string $nomContact
     *
     * @return Clients
     */
    public function setNomContact($nomContact)
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    /**
     * Get nomContact
     *
     * @return string
     */
    public function getNomContact()
    {
        return $this->nomContact;
    }

    /**
     * Set numeroContact
     *
     * @param integer $numeroContact
     *
     * @return Clients
     */
    public function setNumeroContact($numeroContact)
    {
        $this->numeroContact = $numeroContact;

        return $this;
    }

    /**
     * Get numeroContact
     *
     * @return int
     */
    public function getNumeroContact()
    {
        return $this->numeroContact;
    }

    /**
     * Set mailContact
     *
     * @param string $mailContact
     *
     * @return Clients
     */
    public function setMailContact($mailContact)
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    /**
     * Get mailContact
     *
     * @return string
     */
    public function getMailContact()
    {
        return $this->mailContact;
    }
}
