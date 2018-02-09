<?php

namespace BlBundle\Repository;

use Doctrine\ORM\EntityRepository;


/**
 * BonslivraisonRepository
 * @ORM\Entity(repositoryClass="BlBundle\Repository\BonslivraisonRepository")
 */
class BonslivraisonRepository extends \Doctrine\ORM\EntityRepository
{
  public function getLikeQueryBuilder($pattern)
 {
   return $this
     ->createQueryBuilder('c')
     ->where('c.numeroBl LIKE :pattern')
     ->setParameter('pattern', $pattern);
  }

}
