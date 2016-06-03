<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Diahora;
use QQi\RecordappBundle\Form\DiahoraType;

/**
 * Diahora controller.
 *
 */
class DiahoraController extends Controller
{
    /**
     * Lists all Diahora entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Diahora')->findAll();

        return $this->render('QQiRecordappBundle:Diahora:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Diahora entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Diahora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diahora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Diahora:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Diahora entity.
     *
     */
    public function newAction()
    {
        $entity = new Diahora();
        $form   = $this->createForm(new DiahoraType(), $entity);

        return $this->render('QQiRecordappBundle:Diahora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Diahora entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Diahora();
        $form = $this->createForm(new DiahoraType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('diahora_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Diahora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Diahora entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Diahora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diahora entity.');
        }

        $editForm = $this->createForm(new DiahoraType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Diahora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Diahora entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Diahora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diahora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DiahoraType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('diahora_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Diahora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Diahora entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Diahora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Diahora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('diahora'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
