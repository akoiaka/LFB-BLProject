<?php

namespace BlBundle\Controller;

use BlBundle\BlBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Form\BonslivraisonType;
use BlBundle\Entity\Clients;
use BlBundle\Entity\Articles;
use BlBundle\Entity\ArticlesType;
use BlBundle\Entity\Factures;
use BlBundle\Entity\Facture;
use BlBundle\Entity\Bdl;
use BlBundle\Form\BdlType;
use BlBundle\Form\FacturesType;
use BlBundle\Form\FactureType;
use BlBundle\Form\ClientsType;
use BlBundle\Entity\Category;
use BlBundle\Form\CategoryType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Extension\Core\Type\Collection;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;



class VuesController extends Controller
{
    public function accueilAction()
    {

        return $this->render('BlBundle:Vues:accueil.html.twig');
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
            $bl = $em->getRepository("BlBundle:Bdl")->findBy(array(), array('id' => 'DESC'));
            return $this->render('BlBundle:Vues:bllist.html.twig',
                array(
                    'bl' => $bl));

    }

public function viewAction($id)
{
  $em = $this->getDoctrine()->getManager();

  // méthode find($id) pour récupérer un seul bon
  $bons = $em->getRepository('BlBundle:Bdl')->find($id);

  // $bons est donc une instance de BlBundle\Entity\Bdl
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
        // création d'un objet Bdl
        $bons = new Bdl();
        // création du FormBuilder
        // ajout des champs de l'entité souhaités pour le formulaire
//      // class est l objet, la classe, qui represente chaque type dans le Core Symfony
//      // ! valable depuis php 5.5

        $bons->setDateBdl(new \Datetime('now'));

        // ci-dessous nous utilisons la méthode create du service formfactory et appeler le formulaire de BdlType
        $form = $this->get('form.factory')->create(BdlType::class, $bons);

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

                // $em = $this->getDoctrine()->getManager();
                $bl = $em->getRepository("BlBundle:Bdl")->findOneBy(array
                ('id' => $bons));
// print_r($bons);

                return $this->render('BlBundle:Vues:blprint.html.twig',
                    array(
                        'bl' => $bl));


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
        $bons = $this->getDoctrine()->getRepository('BlBundle:Bdl')->find($id);
        $form = $this->createForm(BdlType::class, $bons);
        // $form = $this->get('form.factory')->create(BdlType::class, $bons);

        $form->handleRequest($request);


        if ($form->isValid())
        {
              $bons = $form->getData();

              $em = $this->getDoctrine()->getManager();
              $em->persist($bons);
              $em->flush();

              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Bdl")->findOneBy(array
              ('id' => $bons));
              return $this->render('BlBundle:Vues:blprint.html.twig',
              array('bl' => $bl));

              //redirection vers la page de visualisation du BL nouvellement créé
              return $this->redirectToRoute('blpreview', array('id' => $bons->getId()));
        }

              return $this->render('BlBundle:Vues:bl.html.twig', ['form' => $form->createView(),]);
    }

    public function BlconsultAction(Request $request, $id)
    {
            $bons = $this->getDoctrine()->getRepository('BlBundle:Bdl')->find($id);
            $form = $this->createForm(BdlType::class, $bons);
            $form->handleRequest($request);

              $bons = $form->getData();

              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Bdl")->findOneBy(array
              ('id' => $bons));
              return $this->render('BlBundle:Vues:blconsult.html.twig',
              array('bl' => $bl));

    }


    public function blprintAction(Request $request, $id)
    {
      $bons = $this->getDoctrine()->getRepository('BlBundle:Bdl')->find($id);
      // $bonscategories = $this->getDoctrine()->getRepository('BlBundle:Category')->find($id);
// print_r($bons);
      // $form = $this->createForm(BdlType::class, $bons);
      // $form->handleRequest($request);
      //
      //   $bons = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $bl = $em->getRepository("BlBundle:Bdl")->findOneBy(array
        ('id' => $bons));
        // $categories = $form->getData();
        // return $this->render('BlBundle:Vues:blprint.html.twig',
        // array('bl' => $bl));
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
        $clients = $this->getDoctrine()->getRepository('BlBundle:Bdl')->find($id);
        $form = $this->createForm(BdlType::class, $clients);
        // $form = $this->get('form.factory')->create(BdlType::class, $clients);

        $form->handleRequest($request);


        if ($form->isValid())
        {
              $clients = $form->getData();

              $em = $this->getDoctrine()->getManager();
              $em->persist($clients);
              $em->flush();

              $em = $this->getDoctrine()->getManager();
              $bl = $em->getRepository("BlBundle:Bdl")->findOneBy(array
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

    public function factureAction(Request $request)
    {
      $fact = new Facture();
      $fact->setdateF(new \Datetime('now'));
      $form = $this->get('form.factory')->create(FactureType::class, $fact);
      if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
      {
      $em = $this->getDoctrine()->getManager();
                $em->persist($fact);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Facture enregistrée.');



                $em = $this->getDoctrine()->getManager();
                $fact = $em->getRepository("BlBundle:Facture")->findOneBy(array
                ('id' => $fact));
                return $this->render('BlBundle:Vues:factpreview.html.twig',
                    array(
                        'fact' => $fact));

      return $this->redirectToRoute('factpreview', array('id' => $fact->getId()));
      }

      return $this->render('BlBundle:Vues:facture.html.twig', array(
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

    public function pdfAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $bl = $em->getRepository('BlBundle:Bdl')->findOneById($id);
// print_r($bl);
// die();

        // On crée une  instance pour définir les options de notre fichier pdf
        $options = new Options();
        // Pour simplifier l'affichage des images, on autorise dompdf à utiliser
        // des  url pour les nom de  fichier
        $options->set('isRemoteEnabled', TRUE);
        // On crée une instance de dompdf avec  les options définies
        $dompdf = new Dompdf($options);
        // On demande à Symfony de générer  le code html  correspondant à
        // notre template, et on stocke ce code dans une variable
        $html = $this->renderView(
            'BlBundle:Vues:pdf.html.twig',
            array('bl' => $bl)
        );

        // On envoie le code html  à notre instance de dompdf
        $dompdf->loadHtml($html);
        // On demande à dompdf de générer le  pdf
        $dompdf->set_paper("a4", "portrait");


        $dompdf->render();
        // On renvoie  le flux du fichier pdf dans une  Response pour l'utilisateur
        $dompdf->stream();
      }


}
