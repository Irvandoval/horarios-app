<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Franja;
use QQi\RecordappBundle\Form\FranjaType;

/**
 * Franja controller.
 *
 */
class FranjaController extends Controller
{
    /**
     * Lists all Franja entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Franja')->findAll();

        return $this->render('QQiRecordappBundle:Franja:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Franja entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Franja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Franja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Franja:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Franja entity.
     *
     */
    public function newAction()
    {
        $entity = new Franja();
        $form   = $this->createForm(new FranjaType(), $entity);

        return $this->render('QQiRecordappBundle:Franja:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Franja entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Franja();
        $form = $this->createForm(new FranjaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('franja_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Franja:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Franja entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Franja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Franja entity.');
        }

        $editForm = $this->createForm(new FranjaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Franja:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Franja entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Franja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Franja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FranjaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('franja_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Franja:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Franja entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Franja')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Franja entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('franja'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
