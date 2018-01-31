<?php

namespace BlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class VuesController extends Controller
{
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $bl = $em->getRepository("BlBundle:Bonslivraison")->findAll();
        dump($bl);
        return $this->render('BlBundle:Vues:accueil.html.twig', array(
            'bl' => $bl));
    }


    public function articlesAction()
    {
        return $this->render('BlBundle:Vues:listearticles.html.twig');
    }

    public function clientsAction()
    {
        return $this->render('BlBundle:Vues:listeclients.html.twig');
    }

    public function archivesAction()
    {
        return $this->render('BlBundle:Vues:archives.html.twig');
    }

    public function bllistAction()
    {
        {
            $em = $this->getDoctrine()->getManager();
            $bl = $em->getRepository("BlBundle:Bonslivraison")->findAll();
            return $this->render('BlBundle:Vues:bllist.html.twig',
                array(
                    'bl' => $bl));
        }

//        $em = $this->getDoctrine()->getManager();
////
//        $bl = $em->getRepository('BlBundle:Bonslivraison')->find($id);
//
//        if (null == $bl)
//        {
//            throw new NotFoundHttpException("le bl".$bl." n'existe pas.");
//        }
//
//        return $this->render('BlBundle:Vues:bllist.html.twig', array('bl' => $bl));


//===========  AUTRE ESSAI ===========
//        $bl = $this->getDoctrine()
//            ->getRepository('BlBundle:Bonslivraison')
//            ->find($id);
//        if(!$bl){
//            throw $this->createNotFoundException(
//                'aucun produit trouvé pour cet id :'.$id
//            );
//        }
//                return $this->render('BlBundle:Vues:bllist.html.twig', array('bl' => $bl));
//===========  AUTRE ESSAI ===========

    }

    public function blAction()
    {
        return $this->render('BlBundle:Vues:bl.html.twig');
    }

    public function blpreviewAction()
    {
        return $this->render('BlBundle:Vues:blpreview.html.twig');
    }

    public function clientAction()
    {
        return $this->render('BlBundle:Vues:client.html.twig');
    }

    public function factlistAction()
    {
        return $this->render('BlBundle:Vues:factlist.html.twig');
    }

    public function factpreviewAction()
    {
        return $this->render('BlBundle:Vues:archives.html.twig');
    }

    public function facturesAction()
    {
        return $this->render('BlBundle:Vues:factures.html.twig');
    }

    public function listearticlesAction()
    {
        return $this->render('BlBundle:Vues:listearticles.html.twig');
    }

    public function listeclientsAction()
    {
        return $this->render('BlBundle:Vues:listeclients.html.twig');
    }

    public function modifarticleAction()
    {
        return $this->render('BlBundle:Vues:modifarticle.html.twig');
    }

}