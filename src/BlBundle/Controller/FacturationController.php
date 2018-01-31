<?php

namespace BlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BlBundle\Entity\Facturation;
class FacturationController extends Controller
{
//    /**
//     * @Route("/nouvellefacture/{nom}/{prix}")
//     * @param $nom
//     * @param $prix
//     */
    public function nouvellefactureAction($nom, $prix)
    {
        $fact = new Facturation();
        $fact->setnumFact($nom);
        $fact->setclientFact($prix);
        $em=$this->getDoctrine()->getManager();
        $em->persist($fact);
        $em->flush();

        return $this->render('BlBundle:Vues:nouvellefacture.html.twig',array('facture' => $fact));

    }
}
