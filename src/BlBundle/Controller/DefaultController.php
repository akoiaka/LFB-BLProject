<?php

namespace BlBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Form\BonslivraisonType;
class DefaultController extends Controller
{

    public function indexAction()

    {
        $em = $this->getDoctrine()->getManager();
        $bl = $em->getRepository("BlBundle:Bonslivraison")->findAll();
        return $this->render('BlBundle:Vues:accueil.html.twig', array(
            'bons' => $bl));
    }

    public function ajouterAction(){
        $em = $this->getDoctrine()->getManager();
        $bl = new Bonslivraison();
        $form = $this->createForm(new BonslivraisonType(),$bl);
        // le formulaire a donc comme type BonslivraisonType, et comme contenu $bl

        return $this->render('BlBundle:Vues:accueil.html.twig', array(
            form => createView(),
        ));
    }
//    public function ajouterAction(){
//        $em = $this->getDoctrine()->getManager();
//        $a = new Bonslivraison();
//        $a->setDateBl(new \DateTime())
//          ->setNumeroBl("0011111")
//          ->setDescriptionBl("Testajout")
//          ->setClientBl("testclient")
//          ->setSocieteBl("testsociete")
//          ->setTransporteurBl("testtransporteur")
//          ->setQuantiteBl("testquantite");
//
//        $em->persist($a);
//        $em->flush();
//
//
//        return $this->render('BlBundle:Vues:accueil.html.twig', array());
//    }

//    public function accueilAction()
//    {
//        return $this->render('BlBundle:Vues:accueil.html.twig');
//    }
////
////    /**
//     * @Route("/accueil", name="page1")
//     */
//    public function homeAction(Request $request)
//    {
//        return $this->render('app/Resources/views/Vues/accueil.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
//    }
////
//    /**
//     * @Route("/articles", name="articles")
//     */
//    public function articlesAction(Request $request)
//    {
//        return $this->render('app/Resources/views/Vues/articles.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
//    }
//
//    /**
//     * @Route("/articles", name="clients")
//     */
//    public function clientsAction(Request $request)
//    {
//        return $this->render('app/Resources/views/Vues/listeclients.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
//    }

}


