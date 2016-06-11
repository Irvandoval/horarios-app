<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QQi\RecordappBundle\Entity\Asignatura;
use QQi\RecordappBundle\Form\AsignaturaType;

/**
 * Asignatura controller.
 */
class AsignaturaController extends Controller
{
    /**
     * Lists all Asignatura entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Asignatura')->findAll();

        return $this->render('QQiRecordappBundle:Asignatura:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Asignatura entity.
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Asignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Asignatura:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Asignatura entity.
     */
    public function newAction()
    {
        $entity = new Asignatura();
        $form = $this->createForm(new AsignaturaType(), $entity);

        return $this->render('QQiRecordappBundle:Asignatura:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Asignatura entity.
     */
    public function createAction(Request $request)
    {
        $entity = new Asignatura();
        $form = $this->createForm(new AsignaturaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->set(
           'success', array('title' => 'Guardado!  ', 'message' => 'Se ha guardado la asignatura en el sistema')
           );
            return $this->redirect($this->generateUrl('asignatura_show', array('id' => $entity->getId())));
        } else {
            $asignatura = $entity->getNombre();
            if (!preg_match('/([A-Z]){3}\d{3}$/', $asignatura)) {
                $this->get('session')->getFlashBag()->set(
               'error', array('title' => 'Error!  ', 'message' => 'El formato de asignatura es incorrecto')
               );
            }

            return $this->render('QQiRecordappBundle:Asignatura:new.html.twig', array(
              'entity' => $entity,
              'form' => $form->createView(),
          ));
        }

        return $this->render('QQiRecordappBundle:Asignatura:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Asignatura entity.
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Asignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignatura entity.');
        }

        $editForm = $this->createForm(new AsignaturaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Asignatura:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Asignatura entity.
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Asignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AsignaturaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('asignatura_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Asignatura:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Asignatura entity.
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Asignatura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Asignatura entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->set(
           'success', array('title' => 'Eliminado!  ', 'message' => 'Se ha eliminado la asignatura en el sistema')
           );
        }

        return $this->redirect($this->generateUrl('asignatura'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
