<?php
namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\Bonslivraison2Repository;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\Collection;


/**
 * @ORM\Table()
 */
class Bonslivraison2
{
    /**
    * @ORM\ManyToMany(targetEntity="BlBundle\Entity\Articles", cascade={"persist"})
    */
    private $clients;

    /**
     * @var int
     */
    public $id;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateBl", type="dateTime")
     */
    private $dateBl;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_bl", type="string", nullable=true)
     */
    private $numeroBl;

    /**
     * @var string
     *
     * @ORM\Column(name="description_bl", type="string", nullable=true)
     */
    private $descriptionBl;

    /**
     * @var string
     *
     * @ORM\Column(name="clientBl", type="string", length=255)
     */
    private $clientBl;

    /**
     * @var string
     *
     * @ORM\Column(name="societeBl", type="string", length=255)
     */
    private $societeBl;

    /**
     * @var string
     *
     * @ORM\Column(name="transporteurBl", type="string", length=255)
     */
    private $transporteurBl;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="int")
     */
    private $quantiteBl;

    // ici, avec le constructeur, les paramètres que je veux automatiquement importer avec le chargement de la page
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->categories = new ArrayCollection();
        $this->applications = new ArrayCollection();
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
     * Set dateBl
     *
     * @param \DateTime $dateBl
     *
     * @return Bonslivraison2
     */
    public function setDateBl($dateBl)
    {
        $this->dateBl = $dateBl;

        return $this;
    }

    /**
     * Get dateBl
     *
     * @return \DateTime
     */
    public function getDateBl()
    {
        return $this->dateBl;
    }

    // /**
    //  * Set numeroBl
    //  *
    //  * @param integer $numeroBl
    //  *
    //  * @return Bonslivraison2
    //  */
    // public function setNumeroBl($numeroBl)
    // {
    //     $this->numeroBl = $numeroBl;
    //
    //     return $this;
    // }
    //
    // /**
    //  * Get numeroBl
    //  *
    //  * @return int
    //  */
    // public function getNumeroBl()
    // {
    //     return $this->numeroBl;
    // }

    /**
     * Set descriptionBl
     *
     * @param string $descriptionBl
     *
     * @return Bonslivraison2
     */
    public function setDescriptionBl($descriptionBl)
    {
        $this->descriptionBl = $descriptionBl;

        return $this;
    }

    /**
     * Get descriptionBl
     *
     * @return string
     */
    public function getDescriptionBl()
    {
        return $this->descriptionBl;
    }

    /**
     * Set clientBl
     *
     * @param string $clientBl
     *
     * @return Bonslivraison2
     */
    public function setClientBl($clientBl)
    {
        $this->clientBl = $clientBl;

        return $this;
    }

    /**
     * Get clientBl
     *
     * @return string
     */
    public function getClientBl()
    {
        return $this->clientBl;
    }

    /**
     * Set societeBl
     *
     * @param string $societeBl
     *
     * @return Bonslivraison2
     */
    public function setSocieteBl($societeBl)
    {
        $this->societeBl = $societeBl;

        return $this;
    }

    /**
     * Get societeBl
     *
     * @return string
     */
    public function getSocieteBl()
    {
        return $this->societeBl;
    }

    /**
     * Set transporteurBl
     *
     * @param string $transporteurBl
     *
     * @return Bonslivraison2
     */
    public function setTransporteurBl($transporteurBl)
    {
        $this->transporteurBl = $transporteurBl;

        return $this;
    }

    /**
     * Get transporteurBl
     *
     * @return string
     */
    public function getTransporteurBl()
    {
        return $this->transporteurBl;
    }

    /**
     * Set quantiteBl
     *
     * @param integer $quantiteBl
     *
     * @return Bonslivraison2
     */
    public function setQuantiteBl($quantiteBl)
    {
        $this->quantiteBl = $quantiteBl;

        return $this;
    }

    /**
     * Get quantiteBl
     *
     * @return int
     */
    public function getQuantiteBl()
    {
        return $this->quantiteBl;
    }
}
