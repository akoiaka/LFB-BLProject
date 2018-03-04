<?php

namespace BlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BlBundle\Repository\BonslivraisonRepository;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Date;


/**
 * Category
 */
class Category
{
    /**
     * @ORM\ManyToMany(targetEntity="BlBundle\Entity\Clients", cascade={"persist"})
     */
    private $clients;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ajouter", type="string", length=255)
     */
    public $ajouter;


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
     * Set ajouter
     *
     * @param string $ajouter
     *
     * @return Bonslivraison
     */
    public function setajouter($ajouter)
    {
        $this->ajouter = $ajouter;

        return $this;
    }

    /**
     * Get ajouter
     *
     * @return string
     */
    public function getajouter()
    {
        return $this->ajouter;
    }

}
