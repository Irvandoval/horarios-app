<?php

namespace QQi\RecordappBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Bitacora;

/**
 * Bitacora controller.
 *
 */
class BitacoraController extends Controller
{
    /**
     * Lists all Bitacora entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Bitacora')->findAll();

        return $this->render('QQiRecordappBundle:Bitacora:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Bitacora entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        return $this->render('QQiRecordappBundle:Bitacora:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

}
