<?php

namespace QQi\RecordappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use QQi\RecordappBundle\Entity\Tarea;
use QQi\RecordappBundle\Entity\Usuario;
use QQi\RecordappBundle\Entity\Asignatura;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
		
       return array('name' => $name);
    }

    public function acercadeAction()
    {
        return $this->render('QQiRecordappBundle:Default:acercade.html.twig');
    }

    public function contactoAction()
    {
        return $this->render('QQiRecordappBundle:Default:contacto.html.twig');
    }

    public function ayudaAction()
    {
        return $this->render('QQiRecordappBundle:Default:ayuda.html.twig');
    }
	public function alumnosAction()
    {
		/*$alumnos = array(
		array("matricula"=>1,"nombre"=>"Prueba1"),
		array("matricula"=>1,"nombre"=>"Prueba2")
		);
        return $this->render('QQiRecordappBundle:Default:alumnos.html.twig', array("alumnos"=>$alumnos));*/
		
		// ask the service for a Excel5
		$em = $this->getDoctrine()->getManager();
		 $query = $em->getRepository('QQiRecordappBundle:Asignatura')
            ->createQueryBuilder('e')
            ->getQuery();

        $result = $query->getResult();
		
       $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

       $phpExcelObject->getProperties()->setCreator("liuggio")
           ->setLastModifiedBy("Giulio De Donato")
           ->setTitle("Office 2005 XLSX Test Document")
           ->setSubject("Office 2005 XLSX Test Document")
           ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
           ->setKeywords("office 2005 openxml php")
           ->setCategory("Test result file");
     
		   $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('B2', 'NOMBRE')
            ->setCellValue('C2', 'CODIGO')
            ->setCellValue('D2', 'ESCUELA')
            ->setCellValue('E2', 'IDASIGNATURA');
		   
		   
       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
	   $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('B')
            ->setWidth(40);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('C')
            ->setWidth(10);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('D')
            ->setWidth(50);
        $phpExcelObject->setActiveSheetIndex(0)
            ->getColumnDimension('E')
            ->setWidth(12);
	   
	   $row = 3;
        foreach ($result as $item) {
            $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue('B'.$row, $item->getNombre())
                ->setCellValue('C'.$row, $item->getCodigo())
                ->setCellValue('D'.$row, $item->getIdEscuela()->getNombre())
                ->setCellValue('E'.$row, $item->getId());

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

    public function portadaAction()
    {
        $em = $this->get('doctrine')->getEntityManager();

        $user = $this->get('security.context')->getToken()->getUser();
        $usuarioId = $user->getId();

        $repositorio = $this->getDoctrine()->getRepository('QQiRecordappBundle:Tarea');
        $query = $repositorio->createQueryBuilder('t')
                ->where('t.usuario = :usuario')
                ->andWhere('t.estado = True')
                ->setParameter('usuario', $usuarioId)
                ->orderBy('t.fecha', 'DESC')
                ->getQuery();

        $listadoTareas = $query->getResult();

        $repositorio = $this->getDoctrine()->getRepository('QQiRecordappBundle:Enlace');
        $query = $repositorio->createQueryBuilder('e')
                ->where('e.usuario = :usuario')
                ->andWhere('e.estado = True')
                ->setParameter('usuario', $usuarioId)
                ->orderBy('e.fecha', 'DESC')
                ->getQuery();

        $listadoEnlaces = $query->getResult();

        $fecha = new \DateTime("now");
        return $this->render('QQiRecordappBundle:Default:portada.html.twig', array(
            'fecha' => $fecha,
            'tareas' => $listadoTareas,
            'enlaces' => $listadoEnlaces,
        ));
    }
}
