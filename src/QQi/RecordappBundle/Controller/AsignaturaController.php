<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QQi\RecordappBundle\Entity\Asignatura;
use QQi\RecordappBundle\Form\AsignaturaEditType;
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

        $errors=0;
        $resultado=0;
        $mje1=' ';
        $mje2=' ';

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $numero=$entity->getDemanda();
            $asignatura = $entity->getCodigo();


            if (!preg_match('/([A-Z]){3}\d{3}$/', $asignatura)) {
              $errors=1;
              $mje1='(Error 1: El formato de asignatura es incorrecto)';
            }


            if($numero <= 0){
              $errors=1;
              $mje2='(Error 2: El numero de grupo debe ser mayor que cero)';
            }

            if ($errors <= 0) {
                  $entity->setPendiente($numero);
                  $em->persist($entity);
                  $em->flush();
                  $this->get('session')->getFlashBag()->set(
                 'success', array('title' => 'Guardado!  ', 'message' => 'Se ha guardado la asignatura en el sistema')
                 );
                  return $this->redirect($this->generateUrl('asignatura_show', array('id' => $entity->getId())));
          }
        }
        $mensaje='';
        $mensaje=$mje1.' '.$mje2;


                        $this->get('session')->getFlashBag()->set(
                        'error',array('title' => 'Error!  ','message' => $mensaje)
                        );

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

            return $this->redirect($this->generateUrl('asignatura_show', array('id' => $entity->getId())));
            //return $this->redirect($this->generateUrl('asignatura_edit', array('id' => $id)));
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
    public function verAction($id)
  	{
  		$asignatura = $this->getDoctrine()
  				->getRepository('QQiRecordappBundle:Asignatura')
  				->find($id);

  		if ($asignatura == null) {
  			return $this->render('QQiRecordappBundle:Default:error.html.twig');
  		}

          return $this->render('QQiRecordappBundle:Asignatura:ver.html.twig', array(
              'asignatura' => $asignatura,
          ));
  	}

    public function editarAction($id)
      {
      	$peticion = $this->get('request');
      	$em = $this->getDoctrine()->getEntityManager();


      	if (null == $asignatura = $em->find('QQiRecordappBundle:Asignatura', $id)) {
   	    	return $this->render('QQiRecordappBundle:Default:error.html.twig');
   	    }

   	    $formulario = $this->get('form.factory')->create(new AsignaturaEditType, $asignatura);
   	    #$formulario->setData($usuario);

   	    if ($peticion->getMethod() == 'POST'){
   	    	$formulario->bindRequest($peticion);
   	    	$usuarioAux = $em->find('QQiRecordappBundle:Asignatura', $id);
   	    	$usuarioAux->setCodigo($formulario->get('codigo')->getData());
   	    	$usuarioAux->setIdEscuela($formulario->get('idEscuela')->getData());
   	    	$usuarioAux->setUsuario($formulario->get('usuario')->getData());
   	    	$usuarioAux->setDemanda($formulario->get('demanda')->getData());
   	    	$usuarioAux->setGrupo($formulario->get('grupo')->getData());
          /*
  			$factory = $this->container->get('security.encoder_factory');
  			$usuarioAux->setPassword($formulario->get('password')->getData());
  			$codificador = $factory->getEncoder($usuarioAux);
  			$password = $codificador->encodePassword($usuarioAux->getPassword(), $usuarioAux->getSalt());
  			$usuarioAux->setPassword($password);

   	    	/*if ($formulario->isValid()){*/
   	    		$em->persist($usuarioAux);
   	    		$em->flush();
   	    		return $this->redirect($this->generateUrl('admin_usuario_listado'));
   	    	/*}*/
   	    }

   	    return $this->render('QQiRecordappBundle:Asignatura:editar.html.twig', array(
   	    	'formulario' => $formulario->createView(),
   	    	'asignatura' => $asignatura,
   	    	));

      }


}
