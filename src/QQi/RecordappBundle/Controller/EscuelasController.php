<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Escuelas;
use QQi\RecordappBundle\Form\EscuelasType;

/**
 * Escuelas controller.
 *
 */
class EscuelasController extends Controller
{
    /**
     * Lists all Escuelas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Escuelas')->findAll();

        return $this->render('QQiRecordappBundle:Escuelas:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Escuelas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Escuelas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Escuelas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Escuelas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Escuelas entity.
     *
     */
    public function newAction()
    {
        $entity = new Escuelas();
        $form   = $this->createForm(new EscuelasType(), $entity);

        return $this->render('QQiRecordappBundle:Escuelas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Escuelas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Escuelas();
        $form = $this->createForm(new EscuelasType(), $entity);
        $form->bind($request);

        $errors=0;
        $resultado=0;
        $mje1=' ';

        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();

          $nombre=$entity->getNombre();

          $query = $em->createQuery(
              'SELECT count(p)
              FROM QQiRecordappBundle:Escuelas p
              WHERE p.nombre = :x'
          )->setParameter('x',$nombre);

          $resultado = $query->getSingleScalarResult();

          if($resultado >= 1){
            $errors=1;
            $mje1='(Error 1: Ya existe una Escuela con el mismo nombre '.$nombre.') ';
          }


          if ($errors <= 0) {



            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Se ha Guardado la nueva Escuela.')
            );


            return $this->redirect($this->generateUrl('escuelas_show', array('id' => $entity->getId())));

            }
        }

        $mensaje='';
        $mensaje=$mje1;

        $this->get('session')->getFlashBag()->set(
        'error',array('title' => 'Error!  ','message' => $mensaje)
        );


        return $this->render('QQiRecordappBundle:Escuelas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Escuelas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Escuelas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Escuelas entity.');
        }

        $editForm = $this->createForm(new EscuelasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Escuelas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Escuelas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Escuelas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Escuelas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EscuelasType(), $entity);
        $editForm->bind($request);

        $errors=0;
        $resultado=0;
        $mje1=' ';



        if ($editForm->isValid()) {


            $nombre=$entity->getNombre();

            $query = $em->createQuery(
                'SELECT count(p)
                FROM QQiRecordappBundle:Escuelas p
                WHERE p.nombre = :x'
            )->setParameter('x',$nombre);

            $resultado = $query->getSingleScalarResult();

            if($resultado > 1){
              $errors=1;
              $mje1='(Error 1: Ya existe una Escuela con el mismo nombre '.$nombre.') ';
            }


            if ($errors <= 0) {



            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('escuelas_edit', array('id' => $id)));

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Se ha Actualizado la nueva Escuela.')
            );


            return $this->redirect($this->generateUrl('escuelas_show', array('id' => $entity->getId())));
          }
        }

        $mensaje='';
        $mensaje=$mje1;


                        $this->get('session')->getFlashBag()->set(
                        'error',array('title' => 'Error!  ','message' => $mensaje)
                        );

        return $this->render('QQiRecordappBundle:Escuelas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Escuelas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Escuelas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Escuelas entity.');
            }

            $em->remove($entity);
            $em->flush();

        }

        $this->get('session')->getFlashBag()->set(
        'success',array('title' => 'Exito!  ','message' => 'Se ha Eliminado la Escuela.')
        );
        return $this->redirect($this->generateUrl('escuelas'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
