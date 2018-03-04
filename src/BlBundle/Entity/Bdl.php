<?php

namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\BonslivraisonRepository;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\Collection;


/**
 * Bdl
 */
class Bdl
{
   /**
    * @ORM\ManyToMany(targetEntity="BlBundle\Entity\Clients", cascade={"persist"})
    */
    public $clients;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateBdl;

    /**
     * @var string
     */
    private $numeroBdl;

    /**
     * @var string
     */
    private $descriptionBdl;

    /**
     * @var string
     */
    private $clientBdl;

    /**
     * @var string
     */
    private $article1;

    /**
     * @var string
     */
    private $article2;

    /**
     * @var string
     */
    private $article3;

    /**
     * @var string
     */
    private $transporteurBdl;

    /**
     * @var int
     */
    private $quantite1;

    /**
     * @var int
     */
    private $quantite2;

    /**
     * @var int
     */
    private $quantite3;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->categories = new ArrayCollection();
        $this->categorie = new ArrayCollection();
        $this->applications = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->category = new ArrayCollection();

    }

    public function __toString()
    {

       return $this->getNomClient();
       return $this->getCodeClient();
       return $this->getSocieteClient();
       return $this->getadresse1Livraison();
       return $this->getVille();
       return $this->getDateBl();
       return $this->getDateTime();
       return $this->getajouter();
       return $this->getCategories();


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
     * Set dateBdl
     *
     * @param \DateTime $dateBdl
     *
     * @return Bdl
     */
    public function setDateBdl($dateBdl)
    {
        $this->dateBdl = $dateBdl;

        return $this;
    }

    /**
     * Get dateBdl
     *
     * @return \DateTime
     */
    public function getDateBdl()
    {
        return $this->dateBdl;
    }

    /**
     * Set numeroBdl
     *
     * @param string $numeroBdl
     *
     * @return Bdl
     */
    public function setNumeroBdl($numeroBdl)
    {
        $this->numeroBdl = $numeroBdl;

        return $this;
    }

    /**
     * Get numeroBdl
     *
     * @return string
     */
    public function getNumeroBdl()
    {
        return $this->numeroBdl;
    }

    /**
     * Set descriptionBdl
     *
     * @param string $descriptionBdl
     *
     * @return Bdl
     */
    public function setDescriptionBdl($descriptionBdl)
    {
        $this->descriptionBdl = $descriptionBdl;

        return $this;
    }

    /**
     * Get descriptionBdl
     *
     * @return string
     */
    public function getDescriptionBdl()
    {
        return $this->descriptionBdl;
    }

    /**
     * Set clientBdl
     *
     * @param string $clientBdl
     *
     * @return Bdl
     */
    public function setClientBdl($clientBdl)
    {
        $this->clientBdl = $clientBdl;

        return $this;
    }

    /**
     * Get clientBdl
     *
     * @return string
     */
    public function getClientBdl()
    {
        return $this->clientBdl;
    }

    /**
     * Set article1
     *
     * @param string $article1
     *
     * @return Bdl
     */
    public function setArticle1($article1)
    {
        $this->article1 = $article1;

        return $this;
    }

    /**
     * Get article1
     *
     * @return string
     */
    public function getArticle1()
    {
        return $this->article1;
    }

    /**
     * Set article2
     *
     * @param string $article2
     *
     * @return Bdl
     */
    public function setArticle2($article2)
    {
        $this->article2 = $article2;

        return $this;
    }

    /**
     * Get article2
     *
     * @return string
     */
    public function getArticle2()
    {
        return $this->article2;
    }

    /**
     * Set article3
     *
     * @param string $article3
     *
     * @return Bdl
     */
    public function setArticle3($article3)
    {
        $this->article3 = $article3;

        return $this;
    }

    /**
     * Get article3
     *
     * @return string
     */
    public function getArticle3()
    {
        return $this->article3;
    }

    /**
     * Set transporteurBdl
     *
     * @param string $transporteurBdl
     *
     * @return Bdl
     */
    public function setTransporteurBdl($transporteurBdl)
    {
        $this->transporteurBdl = $transporteurBdl;

        return $this;
    }

    /**
     * Get transporteurBdl
     *
     * @return string
     */
    public function getTransporteurBdl()
    {
        return $this->transporteurBdl;
    }

    /**
     * Set quantite1
     *
     * @param integer $quantite1
     *
     * @return Bdl
     */
    public function setQuantite1($quantite1)
    {
        $this->quantite1 = $quantite1;

        return $this;
    }

    /**
     * Get quantite1
     *
     * @return int
     */
    public function getQuantite1()
    {
        return $this->quantite1;
    }

    /**
     * Set quantite2
     *
     * @param integer $quantite2
     *
     * @return Bdl
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
     * @return Bdl
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
}
