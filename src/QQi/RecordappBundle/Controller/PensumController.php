<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Pensum;
use QQi\RecordappBundle\Form\PensumType;

/**
 * Pensum controller.
 *
 */
class PensumController extends Controller
{
    /**
     * Lists all Pensum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Pensum')->findAll();

        return $this->render('QQiRecordappBundle:Pensum:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Pensum entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Pensum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pensum entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Pensum:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Pensum entity.
     *
     */
    public function newAction()
    {
        $entity = new Pensum();
        $form   = $this->createForm(new PensumType(), $entity);

        return $this->render('QQiRecordappBundle:Pensum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Pensum entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Pensum();
        $form = $this->createForm(new PensumType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pensum_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Pensum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pensum entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Pensum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pensum entity.');
        }

        $editForm = $this->createForm(new PensumType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Pensum:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Pensum entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Pensum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pensum entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PensumType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pensum_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Pensum:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pensum entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Pensum')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pensum entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pensum'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
