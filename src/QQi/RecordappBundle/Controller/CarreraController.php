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

        $errors=0;
        $resultado=0;
        $mje1=' ';


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $nombre=$entity->getNombre();

            $query = $em->createQuery(
                'SELECT count(p)
                FROM QQiRecordappBundle:Carrera p
                WHERE p.nombre = :x'
            )->setParameter('x',$nombre);

            $resultado = $query->getSingleScalarResult();

            if($resultado >= 1){
              $errors=1;
              $mje1='(Error 1: Ya existe un registro con el mismo nombre '.$nombre.') ';
            }



            if ($errors <= 0) {
                $em->persist($entity);
                $em->flush();

                $this->get('session')->getFlashBag()->set(
                'success',array('title' => 'Exito!  ','message' => 'Nueva Carrera guardada.')
                );
                return $this->redirect($this->generateUrl('carrera_show', array('id' => $entity->getId())));
            }
        }

        $mensaje='';
        $mensaje=$mje1;

        $this->get('session')->getFlashBag()->set(
        'error',array('title' => 'Error!  ','message' => $mensaje)
        );

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

        $errors=0;
        $resultado=0;
        $mje1=' ';

        if ($editForm->isValid()) {



          $nombre=$entity->getNombre();

          $query = $em->createQuery(
              'SELECT count(p)
              FROM QQiRecordappBundle:Carrera p
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
              'success',array('title' => 'Exito!  ','message' => 'Se Actualizo la Carrera.')
              );

              //return $this->redirect($this->generateUrl('carrera_edit', array('id' => $id)));
              return $this->redirect($this->generateUrl('carrera_show', array('id' => $entity->getId())));
            }
        }
        $mensaje='';
        $mensaje=$mje1;

        $this->get('session')->getFlashBag()->set(
        'error',array('title' => 'Error!  ','message' => $mensaje)
        );

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

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Se Ha Borrado la Carrera con Éxito.')
            );


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
