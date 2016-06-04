<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Horarioasignatura;
use QQi\RecordappBundle\Form\HorarioasignaturaType;

/**
 * Horarioasignatura controller.
 *
 */
class HorarioasignaturaController extends Controller
{
    /**
     * Lists all Horarioasignatura entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Horarioasignatura')->findAll();

        return $this->render('QQiRecordappBundle:Horarioasignatura:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Horarioasignatura entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Horarioasignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horarioasignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Horarioasignatura:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Horarioasignatura entity.
     *
     */
    public function newAction()
    {
        $entity = new Horarioasignatura();
        $form   = $this->createForm(new HorarioasignaturaType(), $entity);

        return $this->render('QQiRecordappBundle:Horarioasignatura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Horarioasignatura entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Horarioasignatura();
        $form = $this->createForm(new HorarioasignaturaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('yes_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Horarioasignatura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Horarioasignatura entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Horarioasignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horarioasignatura entity.');
        }

        $editForm = $this->createForm(new HorarioasignaturaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Horarioasignatura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Horarioasignatura entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Horarioasignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horarioasignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new HorarioasignaturaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('yes_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Horarioasignatura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Horarioasignatura entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Horarioasignatura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Horarioasignatura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('yes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
