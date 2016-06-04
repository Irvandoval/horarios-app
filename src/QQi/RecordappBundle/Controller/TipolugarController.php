<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Tipolugar;
use QQi\RecordappBundle\Form\TipolugarType;

/**
 * Tipolugar controller.
 *
 */
class TipolugarController extends Controller
{
    /**
     * Lists all Tipolugar entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Tipolugar')->findAll();

        return $this->render('QQiRecordappBundle:Tipolugar:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Tipolugar entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Tipolugar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipolugar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Tipolugar:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Tipolugar entity.
     *
     */
    public function newAction()
    {
        $entity = new Tipolugar();
        $form   = $this->createForm(new TipolugarType(), $entity);

        return $this->render('QQiRecordappBundle:Tipolugar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Tipolugar entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipolugar();
        $form = $this->createForm(new TipolugarType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipolugar_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Tipolugar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tipolugar entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Tipolugar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipolugar entity.');
        }

        $editForm = $this->createForm(new TipolugarType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Tipolugar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipolugar entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Tipolugar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipolugar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipolugarType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipolugar_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Tipolugar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tipolugar entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Tipolugar')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipolugar entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipolugar'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
