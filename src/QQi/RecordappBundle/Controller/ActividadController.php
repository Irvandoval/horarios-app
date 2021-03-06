<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Actividad;
use QQi\RecordappBundle\Form\ActividadType;

/**
 * Actividad controller.
 *
 */
class ActividadController extends Controller
{
    /**
     * Lists all Actividad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Actividad')->findAll();

        return $this->render('QQiRecordappBundle:Actividad:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Actividad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Actividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actividad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Actividad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Actividad entity.
     *
     */
    public function newAction()
    {
        $entity = new Actividad();
        $form   = $this->createForm(new Actividadtype(),$entity);

        return $this->render('QQiRecordappBundle:Actividad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'errors' => null,
        ));
    }

    /**
     * Creates a new Actividad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Actividad();
        $form = $this->createForm(new ActividadType(), $entity);
        $form->bind($request);
        $errors=0;
        $resultado=0;
        $mje1=' ';
        $mje2=' ';
        $mje3=' ';
        $mje4=' ';

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $materia=$entity->getidHoasig();   //horario asignatura trae la asignatura
            $tipo= $entity->getidTipoactividad(); // tipo de grupo
            $numero=$entity->getNumeroGrupo(); //numero de grupo


             $lugar = $entity->getidLugar();
             $franja = $entity->getidFranja();
             $dia = $entity->getidDia();

             $demanda=$entity->getidHoasig()->getidAsignatura()->getDemanda();
             $cupo = $entity->getidLugar()->getCupo();

             $flag=$demanda/$cupo;

             $grupo= $entity->getidTipoactividad()->getNombre();


            switch ($grupo) {
                   case 'GT':{
                       //$mje4='GT';
                       $query = $em->createQuery(
                           'SELECT count(p)
                           FROM QQiRecordappBundle:Actividad p
                           WHERE p.idHoasig = :a and p.numero_grupo = :c and p.idTipoactividad = :y '
                       );
                       $query->setParameter('a',$materia);
                       $query->setParameter('c',$numero);
                       $query->setParameter('y',$tipo);


                       $resultado = $query->getSingleScalarResult();

                       if($resultado >= 2){
                         $errors=1;
                         $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')'.$resultado;
                       }

                       $query = $em->createQuery(
                           'SELECT count(p)
                           FROM QQiRecordappBundle:Actividad p
                           WHERE p.idHoasig = :x and p.idTipoactividad = :y '
                       )->setParameter('x',$materia)->setParameter('y', $tipo);

                       $resultado = $query->getSingleScalarResult();

                       if($resultado >= ceil($flag)*2){
                         $errors=1;
                         $mje4='(Error 4: Ya se ha cubierto la demanda para grupos teoricos para '.$materia.' en '.ceil($flag).' grupos) ';
                       }

                   } //cierre de case

                       break;
                   case 'GD':{
                        //$mje4='GD';

                        $query = $em->createQuery(
                            'SELECT count(p)
                            FROM QQiRecordappBundle:Actividad p
                            WHERE p.idHoasig = :a and p.numero_grupo = :c and p.idTipoactividad = :y '
                        );
                        $query->setParameter('a',$materia);
                        $query->setParameter('c',$numero);
                        $query->setParameter('y',$tipo);


                        $resultado = $query->getSingleScalarResult();

                        if($resultado >= 1){
                          $errors=1;
                          $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')';
                        }



                        $query = $em->createQuery(
                            'SELECT count(p)
                            FROM QQiRecordappBundle:Actividad p
                            WHERE p.idHoasig = :x and p.idTipoactividad = :y '
                        )->setParameter('x',$materia)->setParameter('y', $tipo);

                        $resultado = $query->getSingleScalarResult();

                        if($resultado >= ceil($flag)){
                          $errors=1;
                          $mje4='(Error 4: Ya se ha cubierto la demanda para grupos de discusion para '.$materia.' en '.ceil($flag).' grupos) ';
                        }

                   }

                       break;
                   case 'GL':{
                        //$mje4='GL';

                        $query = $em->createQuery(
                            'SELECT count(p)
                            FROM QQiRecordappBundle:Actividad p
                            WHERE p.idHoasig = :a and p.numero_grupo = :c and p.idTipoactividad = :y '
                        );
                        $query->setParameter('a',$materia);
                        $query->setParameter('c',$numero);
                        $query->setParameter('y',$tipo);


                        $resultado = $query->getSingleScalarResult();

                        if($resultado >= 1){
                          $errors=1;
                          $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')'.$resultado;
                        }

                        $query = $em->createQuery(
                            'SELECT count(p)
                            FROM QQiRecordappBundle:Actividad p
                            WHERE p.idHoasig = :x and p.idTipoactividad = :y '
                        )->setParameter('x',$materia)->setParameter('y', $tipo);

                        $resultado = $query->getSingleScalarResult();

                        if($resultado >= ceil($flag)){
                          $errors=1;
                          $mje4='(Error 4: Ya se ha cubierto la demanda para grupos de laboratorio para '.$materia.' en '.ceil($flag).' grupos) ';
                        }


                   }

                       break;
               }



/*

             $query = $em->createQuery(
                 'SELECT count(p)
                 FROM QQiRecordappBundle:Actividad p
                 WHERE p.idHoasig = :x and p.idTipoactividad = :y '
             )->setParameter('x',$materia)->setParameter('y', $tipo);

             $resultado = $query->getSingleScalarResult();

             if($resultado >= .ceil($flag)*2){
               $errors=1;
               $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.') '.$cupo;
             }

*/


            if($resultado > 1){
              $errors=1;
              $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')';
            }

            if($numero <= 0){
              $errors=1;
              $mje2='(Error 2: El numero de grupo debe ser mayor que cero)';
            }

            $query = $em->createQuery(
                'SELECT count(p)
                FROM QQiRecordappBundle:Actividad p
                WHERE p.idLugar = :x and p.idFranja = :y and p.idDia = :z'
            )->setParameter('x',$lugar)->setParameter('y', $franja)->setParameter('z',$dia);

            $resultado = $query->getSingleScalarResult();

            if($resultado >= 1){
              $errors=1;
              $mje3='(Error 3: Ya existe una actividad en el mismo local, dia y hora) ';
            }


            $validator = $this->get('validator');
            //$errors = $validator->validate($entity); --errores en la validacion del formulario

            if ($errors <= 0) {
                $em->persist($entity);
                $em->flush();
                $exito=0;

                //mensaje de confirmacion
                $this->get('session')->getFlashBag()->set(
                'success',array('title' => 'Exito!  ','message' => 'Nuevo Horario guardado.')
                );
                return $this->redirect($this->generateUrl('actividad_show', array('id' => $entity->getId())));
                }


        //return $this->redirect($this->generateUrl('actividad_show', array('id' => $entity->getId())));
        }
        //mensaje de error



$mensaje='';
$mensaje=$mje1.' '.$mje2.' '.$mje3.' '.$mje4;


                $this->get('session')->getFlashBag()->set(
                'error',array('title' => 'Error!  ','message' => $mensaje)
                );

      return $this->render('QQiRecordappBundle:Actividad:new.html.twig', array(
          'entity' => $entity,
          'form'   => $form->createView(),
      ));
    }

    /**
     * Displays a form to edit an existing Actividad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Actividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actividad entity.');
        }

        $editForm = $this->createForm(new ActividadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Actividad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Actividad entity.
     *
     */
     public function updateAction(Request $request, $id)
       {
           $em = $this->getDoctrine()->getManager();
           $entity = $em->getRepository('QQiRecordappBundle:Actividad')->find($id);
           if (!$entity) {
               throw $this->createNotFoundException('Unable to find Actividad entity.');
           }
           $deleteForm = $this->createDeleteForm($id);
           $editForm = $this->createForm(new ActividadType(), $entity);
           $editForm->bind($request);

           $errors=0;
           $resultado=0;
           $mje1=' ';
           $mje2=' ';
           $mje3=' ';


           if ($editForm->isValid()) {

             $materia=$entity->getidHoasig();   //horario asignatura trae la asignatura
             $tipo= $entity->getidTipoactividad(); // tipo de grupo
             $numero=$entity->getNumeroGrupo(); //numero de grupo
              $lugar = $entity->getidLugar();
              $franja = $entity->getidFranja();
              $dia = $entity->getidDia();


              $demanda=$entity->getidHoasig()->getidAsignatura()->getDemanda();
              $cupo = $entity->getidLugar()->getCupo();

              $flag=$demanda/$cupo;

              $query = $em->createQuery('SELECT count(p)
              FROM QQiRecordappBundle:Actividad p
              WHERE p.idLugar = :x and p.idFranja = :y and p.idDia = :z'
              )->setParameter('x',$lugar)->setParameter('y', $franja)->setParameter('z',$dia);
              $resultado = $query->getSingleScalarResult();
              if($resultado > 1 ){
                  $errors=1;
                  $mje1='(Error 1: Ya existe una actividad en el mismo local, dia y hora) ';
              }



              $grupo= $entity->getidTipoactividad()->getNombre();


              switch ($grupo) {
                    case 'GT':{
                        //$mje4='GT';
                        $query = $em->createQuery(
                            'SELECT count(p)
                            FROM QQiRecordappBundle:Actividad p
                            WHERE p.idHoasig = :a and p.numero_grupo = :c and p.idTipoactividad = :y '
                        );
                        $query->setParameter('a',$materia);
                        $query->setParameter('c',$numero);
                        $query->setParameter('y',$tipo);


                        $resultado = $query->getSingleScalarResult();

                        if($resultado > 2){
                          $errors=1;
                          $mje1='(Error 2: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')'.$resultado;
                        }

                    } //cierre de case

                        break;
                    case 'GD':{
                         //$mje4='GD';

                         $query = $em->createQuery(
                             'SELECT count(p)
                             FROM QQiRecordappBundle:Actividad p
                             WHERE p.idHoasig = :a and p.numero_grupo = :c and p.idTipoactividad = :y '
                         );
                         $query->setParameter('a',$materia);
                         $query->setParameter('c',$numero);
                         $query->setParameter('y',$tipo);


                         $resultado = $query->getSingleScalarResult();

                         if($resultado > 1){
                           $errors=1;
                           $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')';
                         }

                    }

                        break;
                    case 'GL':{
                         //$mje4='GL';

                         $query = $em->createQuery(
                             'SELECT count(p)
                             FROM QQiRecordappBundle:Actividad p
                             WHERE p.idHoasig = :a and p.numero_grupo = :c and p.idTipoactividad = :y '
                         );
                         $query->setParameter('a',$materia);
                         $query->setParameter('c',$numero);
                         $query->setParameter('y',$tipo);


                         $resultado = $query->getSingleScalarResult();

                         if($resultado > 1){
                           $errors=1;
                           $mje1='(Error 1: Ya existe un grupo '.$tipo.' '.$numero.' para la materia '.$materia.')'.$resultado;
                         }

                    }

                        break;
                }












              if($numero <= 0){
                  $errors=1;
                  $mje2='(Error 3: El numero de grupo debe ser mayor que cero)';
              }


            if ($errors <= 0) {
               $em->persist($entity);
               $em->flush();
               $this->get('session')->getFlashBag()->set(
               'success',array('title' => 'Exito!  ','message' => 'El Horario ha sido modificado.')
               );
               return $this->redirect($this->generateUrl('actividad_show', array('id' => $id)));
               //return $this->redirect($this->generateUrl('actividad_edit', array('id' => $id)));
             }
           }
          $mensaje='';
          $mensaje=$mje1.' '.$mje2.' '.$mje3;
                $this->get('session')->getFlashBag()->set(
                'error',array('title' => 'Error!  ','message' => $mensaje)
                );


           return $this->render('QQiRecordappBundle:Actividad:edit.html.twig', array(
               'entity'      => $entity,
               'edit_form'   => $editForm->createView(),
               'delete_form' => $deleteForm->createView(),
           ));
       }

    /**
     * Deletes a Actividad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Actividad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actividad entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->set(
            'success',array('title' => 'Exito!  ','message' => 'El Horario ha sido eliminado.')
            );

        }

        return $this->redirect($this->generateUrl('actividad'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
