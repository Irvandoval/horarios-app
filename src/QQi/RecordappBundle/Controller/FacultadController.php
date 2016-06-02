<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Facultad;
use QQi\RecordappBundle\Form\FacultadType;

/**
 * Facultad controller.
 *
 */
class FacultadController extends Controller
{
    /**
     * Lists all Facultad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Facultad')->findAll();

        return $this->render('QQiRecordappBundle:Facultad:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Facultad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Facultad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facultad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Facultad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Facultad entity.
     *
     */
    public function newAction()
    {
        $entity = new Facultad();
        $form   = $this->createForm(new FacultadType(), $entity);

        return $this->render('QQiRecordappBundle:Facultad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Facultad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Facultad();
        $form = $this->createForm(new FacultadType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('facultad_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Facultad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Facultad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Facultad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facultad entity.');
        }

        $editForm = $this->createForm(new FacultadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Facultad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Facultad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Facultad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facultad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FacultadType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('facultad_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Facultad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Facultad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Facultad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Facultad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('facultad'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
