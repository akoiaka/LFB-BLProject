<?php

namespace BlBundle\Entity;

/**
 * Articles
 */
class Articles
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $codeArt;

    /**
     * @var string
     */
    private $libelleArt;

    /**
     * @var string
     */
    private $familleArt;

    /**
     * @var string
     */
    private $prixHTArt;

    /**
     * @var string
     */
    private $prixTTCArt;


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
     * Set codeArt
     *
     * @param string $codeArt
     *
     * @return Articles
     */
    public function setCodeArt($codeArt)
    {
        $this->codeArt = $codeArt;

        return $this;
    }

    /**
     * Get codeArt
     *
     * @return string
     */
    public function getCodeArt()
    {
        return $this->codeArt;
    }

    /**
     * Set libelleArt
     *
     * @param string $libelleArt
     *
     * @return Articles
     */
    public function setLibelleArt($libelleArt)
    {
        $this->libelleArt = $libelleArt;

        return $this;
    }

    /**
     * Get libelleArt
     *
     * @return string
     */
    public function getLibelleArt()
    {
        return $this->libelleArt;
    }

    /**
     * Set familleArt
     *
     * @param string $familleArt
     *
     * @return Articles
     */
    public function setFamilleArt($familleArt)
    {
        $this->familleArt = $familleArt;

        return $this;
    }

    /**
     * Get familleArt
     *
     * @return string
     */
    public function getFamilleArt()
    {
        return $this->familleArt;
    }

    /**
     * Set prixHTArt
     *
     * @param string $prixHTArt
     *
     * @return Articles
     */
    public function setPrixHTArt($prixHTArt)
    {
        $this->prixHTArt = $prixHTArt;

        return $this;
    }

    /**
     * Get prixHTArt
     *
     * @return string
     */
    public function getPrixHTArt()
    {
        return $this->prixHTArt;
    }

    /**
     * Set prixTTCArt
     *
     * @param string $prixTTCArt
     *
     * @return Articles
     */
    public function setPrixTTCArt($prixTTCArt)
    {
        $this->prixTTCArt = $prixTTCArt;

        return $this;
    }

    /**
     * Get prixTTCArt
     *
     * @return string
     */
    public function getPrixTTCArt()
    {
        return $this->prixTTCArt;
    }
}

