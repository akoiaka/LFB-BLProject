<?php

namespace BlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Form\BonslivraisonType;
class DefaultController extends Controller
{
//
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

}
