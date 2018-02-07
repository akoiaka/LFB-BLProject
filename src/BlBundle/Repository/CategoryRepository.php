<?php

namespace BlBundle\Repository;

use Doctrine\ORM\EntityRepository;


/**
 * CategoryRepository
 * @ORM\Entity(repositoryClass="BlBundle\Repository\CategoryRepository")
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
  public function getLikeQueryBuilder($pattern)
  {
    return $this
    ->createQueryBuilder('c')
    ->where('c.name LIKE :pattern')
    ->setParameter('pattern', $pattern);
  }
}
