<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Carrera;
use QQi\RecordappBundle\Form\CarreraType;

/**
 * Carrera controller.
 *
 */
class CarreraController extends Controller
{
    /**
     * Lists all Carrera entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Carrera')->findAll();

        return $this->render('QQiRecordappBundle:Carrera:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Carrera entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Carrera')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carrera entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Carrera:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Carrera entity.
     *
     */
    public function newAction()
    {
        $entity = new Carrera();
        $form   = $this->createForm(new CarreraType(), $entity);

        return $this->render('QQiRecordappBundle:Carrera:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Carrera entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Carrera();
        $form = $this->createForm(new CarreraType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carrera_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Carrera:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Carrera entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Carrera')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carrera entity.');
        }

        $editForm = $this->createForm(new CarreraType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Carrera:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Carrera entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Carrera')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carrera entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CarreraType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carrera_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Carrera:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Carrera entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Carrera')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Carrera entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('carrera'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
