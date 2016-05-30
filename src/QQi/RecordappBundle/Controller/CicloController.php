<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Ciclo;
use QQi\RecordappBundle\Form\CicloType;

/**
 * Ciclo controller.
 *
 */
class CicloController extends Controller
{
    /**
     * Lists all Ciclo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Ciclo')->findAll();

        return $this->render('QQiRecordappBundle:Ciclo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Ciclo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ciclo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Ciclo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Ciclo entity.
     *
     */
    public function newAction()
    {
        $entity = new Ciclo();
        $form   = $this->createForm(new CicloType(), $entity);

        return $this->render('QQiRecordappBundle:Ciclo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Ciclo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Ciclo();
        $form = $this->createForm(new CicloType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ciclo_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Ciclo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ciclo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ciclo entity.');
        }

        $editForm = $this->createForm(new CicloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Ciclo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ciclo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ciclo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CicloType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ciclo_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Ciclo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ciclo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ciclo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ciclo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
