<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use QQi\RecordappBundle\Entity\Horario;
use QQi\RecordappBundle\Form\HorarioType;
use QQi\RecordappBundle\Entity\Asignatura;
use QQi\RecordappBundle\Entity\Actividad;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Horario controller.
 *
 */
class HorarioController extends Controller
{
    /**
     * Lists all Horario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Horario')->findAll();

        return $this->render('QQiRecordappBundle:Horario:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Horario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Horario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Horario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Horario entity.
     *
     */
    public function newAction()
    {
        $entity = new Horario();
        $form   = $this->createForm(new HorarioType(), $entity);

        return $this->render('QQiRecordappBundle:Horario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Horario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Horario();
        $form = $this->createForm(new HorarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('horario_show', array('id' => $entity->getId())));
        }

        return $this->render('QQiRecordappBundle:Horario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Horario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Horario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horario entity.');
        }

        $editForm = $this->createForm(new HorarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QQiRecordappBundle:Horario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Horario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QQiRecordappBundle:Horario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new HorarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('horario_edit', array('id' => $id)));
        }

        return $this->render('QQiRecordappBundle:Horario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Horario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QQiRecordappBundle:Horario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Horario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('horario'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    /***********************************************/
    public function reporte_h_Action()
    {
		/*$alumnos = array(
		array("matricula"=>1,"nombre"=>"Prueba1"),
		array("matricula"=>1,"nombre"=>"Prueba2")
		);
        return $this->render('QQiRecordappBundle:Default:alumnos.html.twig', array("alumnos"=>$alumnos));*/

		// ask the service for a Excel5
		$em = $this->getDoctrine()->getManager();
		 $query = $em->getRepository('QQiRecordappBundle:Actividad')
            ->createQueryBuilder('e')
            ->getQuery();

        $result = $query->getResult();

       $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
       $phpExcelObject->getActiveSheet()->mergeCells('D3:L3');//Para combinar las celdas
      // $phpExcelObject->getActiveSheet()->mergeCells('D4:L4');
    //   $phpExcelObject->getActiveSheet()->mergeCells('D5:L5');


       $phpExcelObject->getProperties()->setCreator("liuggio")
           ->setLastModifiedBy("Giulio De Donato")
           ->setTitle("Office 2005 XLSX Test Document")
           ->setSubject("Office 2005 XLSX Test Document")
           ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
           ->setKeywords("office 2005 openxml php")
           ->setCategory("Test result file");

		   $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('D3', 'UNIVERSIDAD DE EL SALVADOR')
            ->setCellValue('D4', 'FACULTAD DE INGENIERIA Y ARQUITECTURA')
            ->setCellValue('D5', 'UNIDAD DE MANTENIMIENTO')
            ->setCellValue('B7', 'No')
            ->setCellValue('C7', 'CODIGO')
            ->setCellValue('D7', 'ASIGNATURA')
            ->setCellValue('E7', 'GRUPO')
            ->setCellValue('F7', 'LOCAL')
            ->setCellValue('G7', 'CUPO')
            ->setCellValue('H7', 'DIA')
            ->setCellValue('I7', 'HORA INICIO')
            ->setCellValue('J7', 'HORA FIN')
            ;


       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
	   $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('B')
            ->setWidth(5);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('C')
            ->setWidth(10);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('D')
            ->setWidth(50);
            $phpExcelObject->setActiveSheetIndex(0)
                ->getColumnDimension('E')
                ->setWidth(12);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('F')
            ->setWidth(12);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('G')
            ->setWidth(12);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('H')
            ->setWidth(12);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('I')
            ->setWidth(12);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('J')
            ->setWidth(12);

        	   $row = 8;
        foreach ($result as $item) {
            $phpExcelObject->setActiveSheetIndex(0)
               ->setCellValue('B'.$row, $item->getId())
               ->setCellValue('C'.$row, $item->getidHoasig()->getidAsignatura()->getCodigo())
               ->setCellValue('D'.$row, $item->getidHoasig()->getidAsignatura()->getNombre())
               ->setCellValue('E'.$row, $item->getidTipoactividad().': '.$item->getnumerogrupo())
               ->setCellValue('F'.$row, $item->getidLugar())
               ->setCellValue('G'.$row, $item->getidLugar()->getCupo())
               ->setCellValue('H'.$row, $item->getidDia()->getNombre())
               ->setCellValue('I'.$row, $item->getidFranja()->getHoraInicio()->format('G:ia'))
               ->setCellValue('J'.$row, $item->getidFranja()->getHoraFin()->format('G:ia'))
                ;


            $row++;
        }

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'stream-file.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }
    /***********************************************/
	public function reportepdfAction()
    {
		$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QQiRecordappBundle:Actividad')->findAll();

        return $this->render('QQiRecordappBundle:Horario:horarioPdf.html.twig', array(
            'entities' => $entities,
        ));
    }
	
	/*******************************************/
}
