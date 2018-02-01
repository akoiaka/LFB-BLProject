<?php

namespace BlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Entity\Bonslivraison;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



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

//    /**
//     * @Route("/bl",name="liste")
//     */
    public function blAction(Request $request)
    {

//        return $this->render('BlBundle:Vues:bl.html.twig');
//    }
//
//   public function addAction(Request $request)
//   {
       // création d'un objet Bonslivraison
       $bons = new Bonslivraison();

       // création du FormBuilder grâce au service form factory
       $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $bons);

       // ajout des champs de l'entité souhaités pour le formulaire
       // class est l objet, la classe, qui represente chaque type dans le Core Symfony
       // ! valable depuis php 5.5
       $formBuilder
           ->add('date',              DateType::class)
           ->add('numeroBl',          TextType::class)
           ->add('clientBl',          TextType::class)
           ->add('transporteurBl',    TextType::class)
           ->add('societeBl',         TextType::class)
           ->add('descriptionBl',     TextareaType::class)
           ->add('save',              SubmitType::class)
   ;

       // génération du formulaire
       $form = $formBuilder->getForm();

       // passage de la méthode createView() à la vue pour affichage du formulaire
       return $this->render('BlBundle:Vues:bl.html.twig', array(
           'form' => $form->createView(),
       ));

   }

//    public function formBlAction(Request $request)
//    {
//        $bon = new Bonlivraison();
//        //génération du formulaire
//        $form=$this->createFormBuilder($bon)
//            ->add('numero', textType::class)
//            ->add('reference', textType::class)
//            ->add('nom', textType::class)
//            ->add('contact', textType::class)
//            ->add('remarque', textType::class)
//            ->add('ajouter', submitType::class)
//            ->getForm();
//        $form->handleRequest($request);
//
//        //test de la validité du formulaire
//        if($form->isValid())
//        {
//            $em=$this->getDoctrine()->getManager();
//            $em->persist($bon);
//            $em->flush();
//        //génération de la vue
//            return $this->redirect($this->generateUrl("liste"));
//        }
//        return $this->render('BlBundle:Vues:bl.html.twig',
//            array('f' => $form->createView()));
//
//    }

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