<?php

namespace QQi\RecordappBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use QQi\RecordappBundle\Entity\Usuario;
use QQi\RecordappBundle\Entity\Rol;
use QQi\RecordappBundle\Entity\Asignatura;
use QQi\RecordappBundle\Entity\Escuelas;
use QQi\RecordappBundle\Entity\Facultad;
use QQi\RecordappBundle\Entity\Carrera;
use QQi\RecordappBundle\Entity\Tipolugar;
use QQi\RecordappBundle\Entity\Lugar;
use QQi\RecordappBundle\Entity\Ciclo;
use QQi\RecordappBundle\Entity\Tipoactividad;
use QQi\RecordappBundle\Entity\Estados;
use QQi\RecordappBundle\Entity\Horario;
use QQi\RecordappBundle\Entity\Dia;
use QQi\RecordappBundle\Entity\Franja;
use QQi\RecordappBundle\Entity\Actividad;
use QQi\RecordappBundle\Entity\Horarioasignatura;

class LoadInicial implements FixtureInterface, ContainerAwareInterface
{
    protected $manager;
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $rsm = new ResultSetMapping();
								#eliminar datos anteriores
							 $manager->createNativeQuery('DELETE FROM usuario_rol',$rsm)->getResult();
							 $users = $manager->getRepository('QQiRecordappBundle:Usuario')->findAll();
							 for ($i=0; $i < count($users) ; $i++) {
							 	 $manager->remove($users[$i]);
							 }
								$roles = $manager->getRepository('QQiRecordappBundle:Rol')->findAll();
							 for ($i=0; $i < count($roles) ; $i++) {
							 	 $manager->remove($roles[$i]);
							 }
								$asignaturas = $manager->getRepository('QQiRecordappBundle:Asignatura')->findAll();
								for ($i=0; $i < count($asignaturas) ; $i++) {
									$manager->remove($asignaturas[$i]);
								}
								$escuelas = $manager->getRepository('QQiRecordappBundle:Escuelas')->findAll();
							 for ($i=0; $i < count($escuelas) ; $i++) {
							 	$manager->remove($escuelas[$i]);
							 }
								$facultades = $manager->getRepository('QQiRecordappBundle:Facultad')->findAll();
							 for ($i=0; $i < count($facultades) ; $i++) {
							 	$manager->remove($facultades[$i]);
							 }
								$lugares = $manager->getRepository('QQiRecordappBundle:Lugar')->findAll();
							 for ($i=0; $i < count($lugares) ; $i++) {
							 	$manager->remove($lugares[$i]);
							 }
								$tipoLugares = $manager->getRepository('QQiRecordappBundle:Tipolugar')->findAll();
							 for ($i=0; $i < count($tipoLugares) ; $i++) {
							 	$manager->remove($tipoLugares[$i]);
							 }
								$ciclos = $manager->getRepository('QQiRecordappBundle:Ciclo')->findAll();
							 for ($i=0; $i < count($ciclos) ; $i++) {
							 	 $manager->remove($ciclos[$i]);
							 }
								$tipoActividad = $manager->getRepository('QQiRecordappBundle:Tipoactividad')->findAll();
							 for ($i=0; $i < count($tipoActividad) ; $i++) {
							 	$manager->remove($tipoActividad[$i]);
							 }
        $horarios = $manager->getRepository('QQiRecordappBundle:Horario')->findAll();
							 for ($i=0; $i < count($horarios) ; $i++) {
							 	$manager->remove($horarios[$i]);
							 }
        $estados = $manager->getRepository('QQiRecordappBundle:Estados')->findAll();
        for ($i=0; $i < count($estados) ; $i++) {
         $manager->remove($estados[$i]);
        }
        $dia = $manager->getRepository('QQiRecordappBundle:Dia')->findAll();
        for ($i=0; $i < count($dia) ; $i++) {
         $manager->remove($dia[$i]);
        }
        $franja = $manager->getRepository('QQiRecordappBundle:Franja')->findAll();
        for ($i=0; $i < count($franja) ; $i++) {
         $manager->remove($franja[$i]);
        }
        $actividades = $manager->getRepository('QQiRecordappBundle:Actividad')->findAll();
        for ($i=0; $i < count($actividades) ; $i++) {
         $manager->remove($actividades[$i]);
        }
        $hrs = $manager->getRepository('QQiRecordappBundle:Horarioasignatura')->findAll();
        for ($i=0; $i < count($hrs) ; $i++) {
         $manager->remove($hrs[$i]);
        }
        $carreras = $manager->getRepository('QQiRecordappBundle:carrera')->findAll();
        for ($i=0; $i < count($carreras) ; $i++) {
         $manager->remove($carreras[$i]);
        }


        # Add Rol Administrador
        $rolAdmin = new Rol();
        $rolAdmin->setNombre('ROLE_ADMIN');
        $manager->persist($rolAdmin);
        # Add Rol Usuario
        $rolUser = new Rol();
        $rolUser->setNombre('ROLE_USER');
        $manager->persist($rolUser);
								#Add Facultad
								$facultad = new Facultad();
								$facultad->setNombre('FACULTAD DE INGENIERIA Y ARQUITECTURA');
        $manager->persist($facultad);
								#Add Escuela
								$escuela = new Escuelas();
								$escuela->setNombre('ESCUELA DE INGENIERIA DE SISTEMAS INFORMATICOS');
								$escuela->setIdFacultad($facultad);
								$manager->persist($escuela);
                #add Carrera
                $carrera = new Carrera();
                $carrera->setNombre('(I10515-1998) INGENIERIA DE SISTEMAS INFORMATICOS');
                $carrera->setIdFacultad($facultad);
                $manager->persist($carrera);


        # Add Usuario Administrador
        $usuario = new Usuario();
        $usuario->setNombre('admin');
        $usuario->setApellido('Admin');
        $usuario->setEmail('admin@admin.com');
        $usuario->setActivo(true);
        $factory = $this->container->get('security.encoder_factory');
        $codificador = $factory->getEncoder($usuario);
        $password = $codificador->encodePassword('admin', $usuario->getSalt());
        $usuario->setPassword($password);
        $usuario->addRole($rolAdmin);
        $manager->persist($usuario);
        # Add Usuario Administrador
        $usuario = new Usuario();
        $usuario->setNombre('usuario');
        $usuario->setApellido('Usuario');
        $usuario->setEmail('usuario@usuario.com');
        $usuario->setActivo(true);
        $factory = $this->container->get('security.encoder_factory');
        $codificador = $factory->getEncoder($usuario);
        $password = $codificador->encodePassword('usuario', $usuario->getSalt());
        $usuario->setPassword($password);
        $usuario->addRole($rolUser);
        $manager->persist($usuario);
								#add TipoLugar and Lugar
								$tiposLugarArray = array('Edificio', 'Laboratorio', 'Auditorio');
								$lugarEdificio = array('B11', 'B21', 'B22', 'B31', 'B32', 'B41', 'B42', 'B43',
																															'C11', 'C21', 'C22', 'C31', 'C32', 'C41', 'C42', 'C43',
																															'D11', 'BIB301', 'BIB302');
								$lugarAuditorio = array('Espino', 'Marmol');
								$lugarLaboratorio = array('F1', 'F2', 'F123');
								for ($j=0; $j < count($tiposLugarArray); $j++) {
									 $tipoLugar = new Tipolugar();
										$tipoLugar->setNombre($tiposLugarArray[$j]);
										$manager->persist($tipoLugar);
          // edificio
										if($j == 0){
												for ($k=0; $k < count($lugarEdificio); $k++) {
													 $lugar = new Lugar();
														$lugar->setNombre($lugarEdificio[$k]);
														$lugar->setCupo(60);
														$lugar->setIdFacultad($facultad);
														$lugar->setIdTipolugar($tipoLugar);
														$manager->persist($lugar);
              if($k == 0) $B11 = $lugar;
												}
										}
										//labs
										if($j == 1){
												for ($k=0; $k < count($lugarLaboratorio); $k++) {
													 $lugar = new Lugar();
														$lugar->setNombre($lugarLaboratorio[$k]);
														$lugar->setCupo(60);
														$lugar->setIdFacultad($facultad);
														$lugar->setIdTipolugar($tipoLugar);
														$manager->persist($lugar);
												}
										}
										//auditorium
										if($j == 2){
												for ($k=0; $k < count($lugarAuditorio); $k++) {
													 $lugar = new Lugar();
														$lugar->setNombre($lugarAuditorio[$k]);
														$lugar->setCupo(60);
														$lugar->setIdFacultad($facultad);
														$lugar->setIdTipolugar($tipoLugar);
														$manager->persist($lugar);
												}
										}
								}
								#add Asignaturas
							 $asignaturasNameArray = array('Administracion de Centros de Computo',
																																						'Administracion de Proyectos Informaticos',
																																					 'Arquitectura de Computadoras',
																																					 'Auditoria de Sistemas',
																																					 'Comercio Electronico',
																																					 'Comunicaciones',
																																					 'Consultoria Profesional',
																																					 'Diseño de Sistemas II',
																																					 'Estructura de Datos',
																																					 'Ingenieria de Software',
																																					 'Metodos Probabilisticos');
								$asignaturasCodeArray = array('ACC115',
																																						'API115',
																																					 'ARC115',
																																					 'AUS115',
																																					 'CET115',
																																					 'COS115',
																																					 'CPR115',
																																					 'DSI215',
																																					 'ESD115',
																																					 'IGF115',
																																					 'MEP115');
								for ($i = 0; $i < count($asignaturasCodeArray); $i++) {
										$asignatura = new Asignatura();
										$asignatura->setNombre($asignaturasNameArray[$i]);
										$asignatura->setCodigo($asignaturasCodeArray[$i]);
										$asignatura->setIdEscuela($escuela);
										$manager->persist($asignatura);
          #guardamos objetos para usarlos abajo
          if($i == 0) $primerAsig = $asignatura;

          if($i == 1) $segundaAsig = $asignatura;

							 }
								$ciclo = new Ciclo();
								$ciclo->setNombre('Ciclo II');
								$ciclo->setFechaInicio(new \DateTime('08-08-2015'));
								$ciclo->setFechaFin(new \DateTime('12-12-2015'));
								$manager->persist($ciclo);
								# Tipo Actividad
								$tiposActividadArray = array('GT', 'GD', 'GL');
								for ($i=0; $i < count($tiposActividadArray); $i++) {
								 $tipoActividad = new Tipoactividad();
									$tipoActividad->setNombre($tiposActividadArray[$i]);
									$manager->persist($tipoActividad);
         if($i == 0) $primertipoActividad = $tipoActividad;
								}

        #Crear estados
        $arrayEstados = array('Ingresado',
                              'Pendiente Planificación',
                              'Aprobado Planificación',
                              'Rechazado Planificación',
                              'Aprobado escuela',
                              'Rechazado escuela',
                              'Aprobado',
                              'Rechazado',
                              'Eliminado');
        for ($i=0; $i < count($arrayEstados); $i++) {
          $estado = new Estados();
          $estado->setNombre($arrayEstados[$i]);
          $manager->persist($estado);
          if($i == 6){//si es aprobado
            #Crear horario de prueba
            $horario = new Horario();
            $horario->setFechaCreacion( new \DateTime('02-02-2015'));
            $horario->setIdEscuela($escuela);
            $horario->setIdEstado($estado);
            $horario->setIdCiclo($ciclo);
            $manager->persist($horario);
          }
        }
#Dias
        $dia1 = new Dia();
        $dia1->setNombre('Lunes');
        $manager->persist($dia1);

        $dia2 = new Dia();
        $dia2->setNombre('Martes');
        $manager->persist($dia2);

        $dia3 = new Dia();
        $dia3->setNombre('Miercoles');
        $manager->persist($dia3);

        $dia4 = new Dia();
        $dia4->setNombre('Jueves');
        $manager->persist($dia4);

        $dia5 = new Dia();
        $dia5->setNombre('Viernes');
        $manager->persist($dia5);

        $dia6 = new Dia();
        $dia6->setNombre('Sabado');
        $manager->persist($dia6);
#Franjas
        $franja1 = new Franja();
        $franja1->setNombre('franja 1');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(6,20);
        $dateAux2->setTime(8,00);
        $franja1->setHoraInicio($dateAux);
        $franja1->setHoraFin($dateAux2);
        $franja1->setIdCiclo($ciclo);
        $manager->persist($franja1);

        $franja2 = new Franja();
        $franja2->setNombre('franja 2');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(8,05);
        $dateAux2->setTime(9,45);
        $franja2->setHoraInicio($dateAux);
        $franja2->setHoraFin($dateAux2);
        $franja2->setIdCiclo($ciclo);
        $manager->persist($franja2);

        $franja3 = new Franja();
        $franja3->setNombre('franja 3');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(9,50);
        $dateAux2->setTime(11,30);
        $franja3->setHoraInicio($dateAux);
        $franja3->setHoraFin($dateAux2);
        $franja3->setIdCiclo($ciclo);
        $manager->persist($franja3);

        $franja4 = new Franja();
        $franja4->setNombre('franja 4');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(11,35);
        $dateAux2->setTime(13,15);
        $franja4->setHoraInicio($dateAux);
        $franja4->setHoraFin($dateAux2);
        $franja4->setIdCiclo($ciclo);
        $manager->persist($franja4);

        $franja5 = new Franja();
        $franja5->setNombre('franja 5');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(13,20);
        $dateAux2->setTime(15,00);
        $franja5->setHoraInicio($dateAux);
        $franja5->setHoraFin($dateAux2);
        $franja5->setIdCiclo($ciclo);
        $manager->persist($franja5);

        $franja6 = new Franja();
        $franja6->setNombre('franja 6');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(15,05);
        $dateAux2->setTime(16,45);
        $franja6->setHoraInicio($dateAux);
        $franja6->setHoraFin($dateAux2);
        $franja6->setIdCiclo($ciclo);
        $manager->persist($franja6);

        $franja7 = new Franja();
        $franja7->setNombre('franja 7');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(16,50);
        $dateAux2->setTime(18,30);
        $franja7->setHoraInicio($dateAux);
        $franja7->setHoraFin($dateAux2);
        $franja7->setIdCiclo($ciclo);
        $manager->persist($franja7);

        $franja8 = new Franja();
        $franja8->setNombre('franja 8');
        $dateAux = new \DateTime('06-06-06');
        $dateAux2 = new \DateTime('06-06-06');
        $dateAux ->setTime(18,35);
        $dateAux2->setTime(20,15);
        $franja8->setHoraInicio($dateAux);
        $franja8->setHoraFin($dateAux2);
        $franja8->setIdCiclo($ciclo);
        $manager->persist($franja8);



       #HorarioAsignatura
        $horasig = new Horarioasignatura();
        $horasig->setIdHorario($horario);
        $horasig->setIdAsignatura($primerAsig);
        $horasig->setCorrelativo(1);
        $manager->persist($horasig);
       #lunes805 Gt01
        $actividad = new Actividad();
        $actividad->setIdHoasig($horasig);
        $actividad->setIdTipoactividad($primertipoActividad);
        $actividad->setIdLugar($B11);
        $actividad->setNumeroGrupo(1);
        $actividad->setIdFranja($franja1);
        $actividad->setIdDia($dia1);
        $manager->persist($actividad);
        #miercoles 805
        $actividad1 = new Actividad();
        $actividad1->setIdHoasig($horasig);
        $actividad1->setIdTipoactividad($primertipoActividad);
        $actividad1->setIdLugar($B11);
        $actividad1->setNumeroGrupo(1);
        $actividad1->setIdFranja($franja2);
        $actividad1->setIdDia($dia2);
        $manager->persist($actividad1);

        $manager->flush();
    }
}
