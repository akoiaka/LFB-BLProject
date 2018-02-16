<?php

namespace BlBundle\Entity;

/**
 * Transporteurs
 */
class Transporteurs
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $transporteur;


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
     * Set transporteur
     *
     * @param string $transporteur
     *
     * @return Transporteurs
     */
    public function setTransporteur($transporteur)
    {
        $this->transporteur = $transporteur;

        return $this;
    }

    /**
     * Get transporteur
     *
     * @return string
     */
    public function getTransporteur()
    {
        return $this->transporteur;
    }

    public function __toString()
    {
       return $this->getTransporteur();
    }
}
