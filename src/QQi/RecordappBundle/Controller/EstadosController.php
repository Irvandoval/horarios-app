<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Estados;
use QQi\RecordappBundle\Form\EstadosType;

/**
 * Estados controller.
 *
 */
class EstadosController extends Controller
{
    /**
     * Lists all Estados entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Estados')->findAll();

        return $this->render('QQiRecordappBundle:Estados:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Estados entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Estados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estados entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Estados:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Estados entity.
     *
     */
    public function newAction()
    {
        $entity = new Estados();
        $form   = $this->createForm(new EstadosType(), $entity);

        return $this->render('QQiRecordappBundle:Estados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Estados entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Estados();
        $form = $this->createForm(new EstadosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estados_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Estados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Estados entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Estados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estados entity.');
        }

        $editForm = $this->createForm(new EstadosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Estados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Estados entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Estados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estados entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EstadosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estados_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Estados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Estados entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Estados')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Estados entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estados'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
