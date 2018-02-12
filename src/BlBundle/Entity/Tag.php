<?php

namespace BlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="BlBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    // CETTE ENTITE TAG A ETE CREE DANS LE BUT DE GERER LA PAGINATION
    // IL SE POURRAIT TOUTEFOIS QU ELLE NE SOIT PAS UTILISEE SI J UTILISE UNE AUTRE METHODE
    // DANS CE CAS, SUPPRIMER L ENTITE ET LE REPOSITORY AFFILIÉ.


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
