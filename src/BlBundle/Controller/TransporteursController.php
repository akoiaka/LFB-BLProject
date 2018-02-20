<?php

namespace BlBundle\Controller;

use BlBundle\Entity\Transporteurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Transporteur controller.
 *
 */
class TransporteursController extends Controller
{
    /**
     * Lists all transporteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transporteurs = $em->getRepository('BlBundle:Transporteurs')->findAll();

        return $this->render('transporteurs/index.html.twig', array(
            'transporteurs' => $transporteurs,
        ));
    }

    /**
     * Creates a new transporteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $transporteur = new Transporteurs();
        $form = $this->createForm('BlBundle\Form\TransporteursType', $transporteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transporteur);
            $em->flush();

            return $this->redirectToRoute('transporteurs_show', array('id' => $transporteur->getId()));
        }

        return $this->render('transporteurs/new.html.twig', array(
            'transporteur' => $transporteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a transporteur entity.
     *
     */
    public function showAction(Transporteurs $transporteur)
    {
        $deleteForm = $this->createDeleteForm($transporteur);

        return $this->render('transporteurs/show.html.twig', array(
            'transporteur' => $transporteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing transporteur entity.
     *
     */
    public function editAction(Request $request, Transporteurs $transporteur)
    {
        $deleteForm = $this->createDeleteForm($transporteur);
        $editForm = $this->createForm('BlBundle\Form\TransporteursType', $transporteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transporteurs_edit', array('id' => $transporteur->getId()));
        }

        return $this->render('transporteurs/edit.html.twig', array(
            'transporteur' => $transporteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a transporteur entity.
     *
     */
    public function deleteAction(Request $request, Transporteurs $transporteur)
    {
        $form = $this->createDeleteForm($transporteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transporteur);
            $em->flush();
        }

        return $this->redirectToRoute('transporteurs_index');
    }

    /**
     * Creates a form to delete a transporteur entity.
     *
     * @param Transporteurs $transporteur The transporteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Transporteurs $transporteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transporteurs_delete', array('id' => $transporteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
