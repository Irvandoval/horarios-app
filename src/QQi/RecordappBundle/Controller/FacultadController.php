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
        $errors=0;
        $resultado=0;
        $mje1=' ';

        if ($form->isValid()) {


          $em = $this->getDoctrine()->getManager();

          $nombre = $entity->getNombre();

          $query = $em->createQuery(
              'SELECT count(p)
              FROM QQiRecordappBundle:Facultad p
              WHERE p.nombre = :x'
          )->setParameter('x',$nombre);

          $resultado = $query->getSingleScalarResult();

          if($resultado >= 1){
            $errors=1;
            $mje1='(Error 1: Ya existe un registro con el mismo nombre '.$nombre.') ';
          }

          if ($errors <= 0) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Nuevo Facultad Guardada.')
            );

            return $this->redirect($this->generateUrl('facultad_show', array('id' => $entity->getId())));
          }
        }

        $mensaje='';
        $mensaje=$mje1;


                        $this->get('session')->getFlashBag()->set(
                        'error',array('title' => 'Error!  ','message' => $mensaje)
                        );

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


        $errors=0;
        $resultado=0;
        $mje1=' ';


        if ($editForm->isValid()) {

          $nombre = $entity->getNombre();

          $query = $em->createQuery(
              'SELECT count(p)
              FROM QQiRecordappBundle:Facultad p
              WHERE p.nombre = :x'
          )->setParameter('x',$nombre);

          $resultado = $query->getSingleScalarResult();

          if($resultado > 1){
            $errors=1;
            $mje1='(Error 1: Ya existe un registro con el mismo nombre '.$nombre.') ';
          }

          if ($errors <= 0) {

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Facultad Actualizada.')
            );

            return $this->redirect($this->generateUrl('facultad_show', array('id' => $entity->getId())));
            //return $this->redirect($this->generateUrl('facultad_edit', array('id' => $id)));
          }
        }

        $mensaje='';
        $mensaje=$mje1;


                        $this->get('session')->getFlashBag()->set(
                        'error',array('title' => 'Error!  ','message' => $mensaje)
                        );

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
            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'La facultad ha sido eliminada.')
            );
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
