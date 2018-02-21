<?php

namespace BlBundle\Controller;

use BlBundle\BlBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Entity\Clients;
use BlBundle\Entity\Articles;
use BlBundle\Entity\ArticlesType;
use BlBundle\Entity\Factures;
use BlBundle\Form\BonslivraisonType;
use BlBundle\Form\FacturesType;
use BlBundle\Form\ClientsType;
use Symfony\Component\Form\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormView;
use Dompdf\Options;
use Dompdf\Dompdf;



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

            $em = $this->getDoctrine()->getManager();
            $bl = $em->getRepository("BlBundle:Bonslivraison")->findBy(array(), array('id' => 'DESC'));
            return $this->render('BlBundle:Vues:bllist.html.twig',
                array(
                    'bl' => $bl));

    }

public function viewAction($id)
{
  $em = $this->getDoctrine()->getManager();

  // méthode find($id) pour récupérer un seul bon
  $bons = $em->getRepository('BlBundle:Bonslivraison')->find($id);

  // $bons est donc une instance de BlBundle\Entity\Bonslivraison
  // ou null si l'id $id n'existe pas, d'où ce if :
  if (null === $bons) {
    throw new NotFoundHttpException("Le bon ".$id." n'existe pas.");
  // }
  // // Récupération de la liste des candidatures de l'annonce
  // $listApplications = $em
  // ;
  // // Récupération des AdvertSkill de l'annonce
  // $listAdvertSkills = $em
  //   ->getRepository('BlBundle:AdvertSkill')
  //   ->findBy(array('advert' => $advert))
  ;
  return $this->render('BlBundle:Vues:blpreview.html.twig', array(
    'Bons'           => $bons,
    // 'listApplications' => $listApplications,
    // 'listAdvertSkills' => $listAdvertSkills,
  ));
}
}

//    /**
//     * @Route("/bl",name="liste")
//     */
    public function blAction(Request $request)
    {
        // création d'un objet Bonslivraison
        $bons = new Bonslivraison();
        // création du FormBuilder
        // ajout des champs de l'entité souhaités pour le formulaire
//      // class est l objet, la classe, qui represente chaque type dans le Core Symfony
//      // ! valable depuis php 5.5

        $bons->setDateBl(new \Datetime('now'));

        // ci-dessous nous utilisons la méthode create du service formfactory et appeler le formulaire de BonslivraisonType
        $form = $this->get('form.factory')->create(BonslivraisonType::class, $bons);
        // ou tout simplement
        // $form = $this->createForm(BonslivraisonType::class, $bons)


        // en passant par formtype, nous n utiliserons pas la methode createFormBuilder qui est ci-dessous meme si elle fonctionnelle

//         $form = $this->createFormBuilder($bons)
//             ->add('dateBl',            DateTimeType::class)
// //            Le typeDateType que l'on a utilisé affiche 3 champs select
// //            Il existe aussi un type TimezoneType pour choisir le fuseau horaire
//             ->add('numeroBl',          TextType::class)
//             ->add('clientBl',          TextType::class)
//             ->add('societeBl',         TextType::class)
//             ->add('quantiteBl',        TextType::class)
//             ->add('descriptionBl',     TextareaType::class)
//             ->add('transporteurBl',    TextType::class)
// //            ci-dessous le bouton valider a été commenté car je l ai injecté directement dans la vue (voir bl.html.twig)
// //            ->add('Valider',           SubmitType::class)
//             ->getForm();
        // noter qu ici on aurait très bien pu écrire aussi:
        // Symfony\Component\Form\Extension\Core\Type\TextType

        // pour rendre un champ facultatif, utiliser le 3e argument de la méthode $formBuilder->add()
        // qui est "required" exemple: $formBuilder->add('published', CheckboxType::class, array('required' => false))

        // si la requête est en POST
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
            {
//                lien entre requête et formulaire en prépa de synchro avec bdd
            // $form->handleRequest($request);

            // vérification de l exactitude des données rentrées
            // if ($form->isValid()) {
                // enregistrement de l objet Bons dans la base de données
                $em = $this->getDoctrine()->getManager();
                // var_dump(serialize($bons));

                $em->persist($bons);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Bon enregistré.');

                $em = $this->getDoctrine()->getManager();
                $bl = $em->getRepository("BlBundle:Bonslivraison")->findOneBy(array
                ('id' => $bons));
                $bons->getClients();
                return $this->render('BlBundle:Vues:blprint.html.twig',
                    array(
                        'bl' => $bl));


                //redirection vers la page de visualisation du BL nouvellement créé
                return $this->redirectToRoute('blprint', array('id' => $bons->getId()));
            }
                    //
                    // À ce stade, le formulaire peut ne pas être valide car :
                    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
                    // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau

                    // génération du formulaire
                    // passage de la méthode createView() à la vue pour affichage du formulaire
                    return $this->render('BlBundle:Vues:bl.html.twig', array(
                        'form' => $form->createView(),
                    ));
        }


    public function BleditAction(Request $request, $id)
    {
        $bons = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->find($id);
        $form = $this->createForm(BonslivraisonType::class, $bons);
        // $form = $this->get('form.factory')->create(BonslivraisonType::class, $bons);

        $form->handleRequest($request);


        if ($form->isValid())
        {
              $bons = $form->getData();

              $em = $this->getDoctrine()->getManager();
              $em->persist($bons);
              $em->flush();

              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Bonslivraison")->findOneBy(array
              ('id' => $bons));
              return $this->render('BlBundle:Vues:blpreview.html.twig',
              array('bl' => $bl));

              //redirection vers la page de visualisation du BL nouvellement créé
              return $this->redirectToRoute('blpreview', array('id' => $bons->getId()));
        }

              return $this->render('BlBundle:Vues:bl.html.twig', ['form' => $form->createView(),]);
    }

    public function BlconsultAction(Request $request, $id)
    {
            $bons = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->find($id);
            $form = $this->createForm(BonslivraisonType::class, $bons);
            $form->handleRequest($request);

              $bons = $form->getData();

              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Bonslivraison")->findOneBy(array
              ('id' => $bons));
              return $this->render('BlBundle:Vues:blconsult.html.twig',
              array('bl' => $bl));

    }

    public function blpreviewAction()
    {
        return $this->render('BlBundle:Vues:blpreview.html.twig');
    }

    public function blprintAction(Request $request, $id)
    {
      $bons = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->find($id);
      $form = $this->createForm(BonslivraisonType::class, $bons);
      $form->handleRequest($request);

        $bons = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $bl = $em->getRepository("BlBundle:Bonslivraison")->findOneBy(array
        ('id' => $bons));
        return $this->render('BlBundle:Vues:blprint.html.twig',
        array('bl' => $bl));
    }

    public function clientAction(Request $request)
    {
      $clients = new Clients();
      $form = $this->get('form.factory')->create(ClientsType::class, $clients);
      if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
              {
              $em = $this->getDoctrine()->getManager();
              $em->persist($clients);
              $em->flush();

              $request->getSession()->getFlashBag()->add('notice', 'OK, client ajouté en base.');
              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Clients")->findOneBy(array
              ('id' => $clients));
              $clients->getClients();
              return $this->render('BlBundle:Vues:client.html.twig',
                  array(
                      'bl' => $bl));
              return $this->redirectToRoute('client', array('id' => $clients->getId()));
              }
                  return $this->render('BlBundle:Vues:client.html.twig', array(
                      'form' => $form->createView(),
                  ));

      }

    public function ClienteditAction(Request $request, $id)
    {
        $clients = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->find($id);
        $form = $this->createForm(BonslivraisonType::class, $clients);
        // $form = $this->get('form.factory')->create(BonslivraisonType::class, $clients);

        $form->handleRequest($request);


        if ($form->isValid())
        {
              $clients = $form->getData();

              $em = $this->getDoctrine()->getManager();
              $em->persist($clients);
              $em->flush();

              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Bonslivraison")->findOneBy(array
              ('id' => $clients));
              return $this->render('BlBundle:Vues:blpreview.html.twig',
              array('bl' => $bl));

              //redirection vers la page de visualisation du BL nouvellement créé
              return $this->redirectToRoute('blpreview', array('id' => $clients->getId()));
        }

              return $this->render('BlBundle:Vues:bl.html.twig', ['form' => $form->createView(),]);
    }


    public function facturesAction(Request $request)
    {
      $fact = new Factures();
      $fact->setdateFacture(new \Datetime('now'));
      $form = $this->get('form.factory')->create(FacturesType::class, $fact);
      if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
      {
      $em = $this->getDoctrine()->getManager();
                $em->persist($fact);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Facture enregistrée.');



                $em = $this->getDoctrine()->getManager();
                $fact = $em->getRepository("BlBundle:Factures")->findOneBy(array
                ('id' => $fact));
                return $this->render('BlBundle:Vues:factpreview.html.twig',
                    array(
                        'fact' => $fact));

      return $this->redirectToRoute('factpreview', array('id' => $fact->getId()));
      }

      return $this->render('BlBundle:Vues:factures.html.twig', array(
                        'form' => $form->createView(),
                    ));
    }

    public function factlistAction()
    {
      $em = $this->getDoctrine()->getManager();
      $fact = $em->getRepository("BlBundle:Factures")->findBy(array(), array('id' => 'DESC'));
      return $this->render('BlBundle:Vues:factlist.html.twig',
      array(
        'fact' => $fact));
    }

    public function factpreviewAction()
    {
        return $this->render('BlBundle:Vues:factpreview.html.twig');
    }



    public function factconsultAction(Request $request, $id)
    {
            // $fact = $this->getDoctrine()->getRepository('BlBundle:Factures')->find($id);
            // $form = $this->createForm(FacturesType::class, $fact);
            // $form->handleRequest($request);
            //
            //   $fact = $form->getData();
            //
            //   $em = $this->getDoctrine()->getManager();
            //   $fact = $em->getRepository("BlBundle:Factures")->findOneBy(array
            //   ('id' => $fact));
            //   return $this->render('BlBundle:Vues:factconsult.html.twig',
            //   array('fact' => $fact));

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

// CI-DESSOUS LA CONVERSION EN PDF POUR IMPRESSION //

public function toPdfAction($BonslivraisonId){
  // dopdf est installé à partir de Composer: composer require dompdf/dompdf
  // puis les require (use) nécessaires dans le controller (voir ci-dessus dans les use)

  // On récupère l'objet à afficher
  $bonslivraisonRepository = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison');
  $bonslivraison = $bonslivraisonRepository->findoneById($bonslivraisonId);

  // on crée une instance pour définir les options de notre fichier PDF
  $options = new Options();

  // pour simplifier l affiche, on autorise dompdf à utiliser des url pour les noms de fichier
  $optons->set('isRemoteEnabled', TRUE);

  // on crée une instance de dompdf avec les options définies
  $dompdf = new Dompdf($options);

  // on demande ensuite à Symfony de générer le code html correspondant à notre template puis on stocke ce code dans une variable
  $html = $this->renderView('BlBundle:Bonslivraison:pdfTemplate.html.twig', array('bonslivraison' => $bonslivraison));

  // puis on demande à dompdf de générer le PDF
  $dompdf->render();

  // on renvoie le flux du fichier pdf dans une Response pour l utilisateur
  return new Response ($dompdf->stream());

}

public function pdfAction(Request $request, $id){
  // dopdf est installé à partir de Composer: composer require dompdf/dompdf
  // puis les require (use) nécessaires dans le controller (voir ci-dessus dans les use)

  // On récupère l'objet à afficher
  // $bonslivraisonRepository = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->findOneById($bonslivraison);

  // $bons = new Bonslivraison();
  // $bons = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->find($id);
  // // $bons = $form->getData();

    $em = $this->getDoctrine()->getManager();
    $bons = new Bonslivraison();

    $bl = $em->getRepository("BlBundle:Bonslivraison")->findOneBy(array
    ('id' => $bons));

  // $bonslivraison = $bonslivraisonRepository->findby($id);
  //
  // $bons = $this->getDoctrine()->getRepository('BlBundle:Bonslivraison')->find($id);

  // $form->handleRequest($request);

  // on crée une instance pour définir les options de notre fichier PDF
  $options = new Options();

  // pour simplifier l affiche, on autorise dompdf à utiliser des url pour les noms de fichier
  $options->set('isRemoteEnabled', TRUE);

  // on crée une instance de dompdf avec les options définies
  $dompdf = new Dompdf($options);
  $bons = new Bonslivraison($options);


  // on demande ensuite à Symfony de générer le code html correspondant à notre template puis on stocke ce code dans une variable
  $html = $this->renderView('BlBundle:Vues:view.html.twig');

  $dompdf->loadHtml($html);


  // puis on demande à dompdf de générer le PDF
  $dompdf->render();

  // on renvoie le flux du fichier pdf dans une Response pour l utilisateur
  return new Response ($dompdf->stream());

}

}
