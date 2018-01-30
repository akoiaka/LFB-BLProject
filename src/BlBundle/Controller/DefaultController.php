<?php

namespace BlBundle\Controller;

use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Form\BonslivraisonType;
use BlBundle\Repository\BonslivraisonRepository;
class DefaultController extends Controller
{

    public function indexAction()

    {
        $em = $this->getDoctrine()->getManager();
        $bl = $em->getRepository("BlBundle:Bonslivraison")->findAll();
        return $this->render('BlBundle:Vues:accueil.html.twig', array(
            'bl' => $bl));
    }

    public function ajouterAction(){
        $em = $this->getDoctrine()->getManager();
        $bl = new Bonslivraison();
        $form = $this->createForm(new BonslivraisonType(), $bl);
        // le formulaire a donc comme type BonslivraisonType, et comme contenu $bl

        $request = $this->getRequest();
        if($request->isMethod('POST')){
            $form->bindRequest($request);

            $bl = $form->getData();
            $em->persist($bl);
            $em->flush();

            return $this->redirect($this->generateUrl("articles"));
        }
        return $this->render('BlBundle:Vues:accueil.html.twig', array(
            form => createView(),
        ));
    }

    public function newAction(Request $resquest)
    {
        $task = new Task();
        $task->setTask('Ecrire des notes');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('BlBundle:Vues:accueil.html.twig', array(
            'form' => $form->createView(),
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


