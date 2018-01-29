<?php
namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BlBundle\Repository\BonslivraisonRepository")
 */
class Bonslivraison
{
    /**
     * @var int
     *
     */
    public $id;

    /**
     * @var \DateTime
     */
    private $dateBl;

    /**
     * @var int
     */
    private $numeroBl;

    /**
     * @var string
     */
    private $descriptionBl;

    /**
     * @var string
     */
    private $clientBl;

    /**
     * @var string
     */
    private $societeBl;

    /**
     * @var string
     */
    private $transporteurBl;

    /**
     * @var int
     */
    private $quantiteBl;

    // ici, avec le constructeur, les paramètres que je veux automatiquement importer avec le chargement de la page
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
     * Set dateBl
     *
     * @param \DateTime $dateBl
     *
     * @return Bonslivraison
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

    /**
     * Set numeroBl
     *
     * @param integer $numeroBl
     *
     * @return Bonslivraison
     */
    public function setNumeroBl($numeroBl)
    {
        $this->numeroBl = $numeroBl;

        return $this;
    }

    /**
     * Get numeroBl
     *
     * @return int
     */
    public function getNumeroBl()
    {
        return $this->numeroBl;
    }

    /**
     * Set descriptionBl
     *
     * @param string $descriptionBl
     *
     * @return Bonslivraison
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
     * @return Bonslivraison
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
     * @return Bonslivraison
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
     * @return Bonslivraison
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
     * @return Bonslivraison
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

