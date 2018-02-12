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

  // ci-dessous la fonction pour la pagination des bons de livraison
  public function getBons($first_result, $max_results = 20)
     {
         $qb = $this->createQueryBuilder('bons');
         $qb
             ->select('bons')
             ->setFirstResult($first_result)
             ->setMaxResults($max_results);

         $pag = new Paginator($qb);
         return $pag;

         count($pag);

         // lister les 20 premies bons de livraison
         $bls = $bons_repository->getBons(0);
         foreach ($bls as $bl)
         {
           echo $bls->getId() . '&lt;br /&gt;';
         }
     }
}
