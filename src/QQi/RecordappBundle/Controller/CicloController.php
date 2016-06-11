<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Ciclo;
use QQi\RecordappBundle\Form\CicloType;

/**
 * Ciclo controller.
 *
 */
class CicloController extends Controller
{
    /**
     * Lists all Ciclo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Ciclo')->findAll();

        return $this->render('QQiRecordappBundle:Ciclo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Ciclo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ciclo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Ciclo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Ciclo entity.
     *
     */
    public function newAction()
    {
        $entity = new Ciclo();
        $form   = $this->createForm(new CicloType(), $entity);

        return $this->render('QQiRecordappBundle:Ciclo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Ciclo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Ciclo();
        $form = $this->createForm(new CicloType(), $entity);
        $form->bind($request);

        $errors=0;
        $resultado=0;
        $mje1=' ';
        $mje2=' ';
        $mje3=' ';
        $mje4=' ';
        $mje5=' ';

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();


            $f1=date_format($entity->getfechaInicio(), 'YYYY-mm-dd');
            $f2=date_format($entity->getfechafin(), 'YYYY-mm-dd');
            $nombre=$entity->getNombre();


            if(strcmp($f1,$f2) < 0)
            {
            #$fecha2 es mayor a $fecha1
            }
            else
            if(strcmp($f1,$f2) == 0)
            {
            #$fecha2 es igual a $fecha1
            $errors=1;
            $mje1='(Error 1: Las fechas son iguales) ';
            }
            else
            {
            #$fecha2 es menor a $fecha1
            $errors=1;
            $mje2='(Error 2: La fecha fin es menor a la fecha de inicio) ';
            }

            $query = $em->createQuery(
                'SELECT count(p)
                FROM QQiRecordappBundle:Ciclo p
                WHERE p.nombre = :x'
            )->setParameter('x',$nombre);

            $resultado = $query->getSingleScalarResult();

            if($resultado >= 1){
              $errors=1;
              $mje3='(Error 3: Ya existe un registro con el mismo nombre '.$nombre.') ';
            }


            /*
            $mes1=date("m", strtotime($f1));
            $mes2=date("m", strtotime($f2));

            $res=$mes2+$mes1;
            if($res < 5){
                        $errors=1;
                        $mje4='(Error 4: El ciclo no puede durar menos de 6 meses) '.$mes2.' '.$mes1.' '.$res;
            }
            if($res > 5)
            {
                        $errors=1;
                        $mje4='(Error 5: El ciclo no puede durar mas de 6 meses) ';
            }
            */

            if ($errors <= 0) {
                $em->persist($entity);
                $em->flush();

                $this->get('session')->getFlashBag()->set(
                'success',array('title' => 'Exito!  ','message' => 'Nuevo Ciclo guardado.')
                );

                return $this->redirect($this->generateUrl('ciclo_show', array('id' => $entity->getId())));
            }
        }

        $mensaje='';
        $mensaje=$mje1.' '.$mje2.' '.$mje3.' '.$mje4.' '.$mje5;


                        $this->get('session')->getFlashBag()->set(
                        'error',array('title' => 'Error!  ','message' => $mensaje)
                        );

        return $this->render('QQiRecordappBundle:Ciclo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ciclo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ciclo entity.');
        }

        $editForm = $this->createForm(new CicloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Ciclo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ciclo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

        $errors=0;
        $resultado=0;
        $mje1=' ';
        $mje2=' ';
        $mje3=' ';
        $mje4=' ';
        $mje5=' ';

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ciclo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CicloType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {

          $f1=date_format($entity->getfechaInicio(), 'YYYY-mm-dd');
          $f2=date_format($entity->getfechafin(), 'YYYY-mm-dd');
          $nombre=$entity->getNombre();


          if(strcmp($f1,$f2) < 0)
          {
          #$fecha2 es mayor a $fecha1
          }
          else
          if(strcmp($f1,$f2) == 0)
          {
          #$fecha2 es igual a $fecha1
          $errors=1;
          $mje1='(Error 1: Las fechas son iguales) ';
          }
          else
          {
          #$fecha2 es menor a $fecha1
          $errors=1;
          $mje2='(Error 2: La fecha fin es menor a la fecha de inicio) ';
          }

          $query = $em->createQuery(
              'SELECT count(p)
              FROM QQiRecordappBundle:Ciclo p
              WHERE p.nombre = :x'
          )->setParameter('x',$nombre);

          $resultado = $query->getSingleScalarResult();

          if($resultado > 1){
            $errors=1;
            $mje3='(Error 3: Ya existe un registro con el mismo nombre '.$nombre.') ';
          }


          if ($errors <= 0) {

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Se ha Actualizado el Ciclo.')
            );

            return $this->redirect($this->generateUrl('ciclo_show', array('id' => $entity->getId())));

            //return $this->redirect($this->generateUrl('ciclo_edit', array('id' => $id)));
          }
        }


        $mensaje='';
        $mensaje=$mje1.' '.$mje2.' '.$mje3.' '.$mje4.' '.$mje5;


                        $this->get('session')->getFlashBag()->set(
                        'error',array('title' => 'Error!  ','message' => $mensaje)
                        );

        return $this->render('QQiRecordappBundle:Ciclo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ciclo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Ciclo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ciclo entity.');
            }

            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'Se ha Borrado el Ciclo.')
            );
        }

        return $this->redirect($this->generateUrl('ciclo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
