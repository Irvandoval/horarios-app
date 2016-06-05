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
                $carrera = $manager->getRepository('QQiRecordappBundle:Carrera')->findAll();
               for ($i=0; $i < count($carrera) ; $i++) {
                $manager->remove($carrera[$i]);
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
        # Add Rol Administrador
        $rolAdmin = new Rol();
        $rolAdmin->setNombre('ROLE_ADMIN');
        $manager->persist($rolAdmin);
        # Add Rol Usuario
        $rolUser = new Rol();
        $rolUser->setNombre('ROLE_USER');
        $manager->persist($rolUser);

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


		            #Add Facultad
								$facultad = new Facultad();
								$facultad->setNombre('FACULTAD DE INGENIERIA Y ARQUITECTURA');
								$manager->persist($facultad);

								#Add Escuela
								$escuela = new Escuelas();
								$escuela->setNombre('ESCUELA DE INGENIERIA DE SISTEMAS INFORMATICOS');
								$escuela->setIdFacultad($facultad);
								$manager->persist($escuela);

                #Add Carrera
                $carrera = new Carrera();
								$carrera->setNombre('INGENIERÍA DE SISTEMAS INFORMÁTICOS I10515');
                $carrera->setIdFacultad($facultad);
								$manager->persist($carrera);

								#add TipoLugar and Lugar
								$tiposLugarArray = array('Edificio', 'Laboratorio', 'Auditorio');
								$lugarEdificio = array('B11', 'B21', 'B22', 'B31', 'B32', 'B41', 'B42', 'B43', 'C11', 'C21', 'C22', 'C31', 'C32', 'C41', 'C42', 'C43',	'D11', 'BIB301', 'BIB302');
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
							 }
               $ciclo = new Ciclo();
               $ciclo->setNombre('Ciclo I');
               $ciclo->setFechaInicio(new \DateTime('01-02-2015'));
               $ciclo->setFechaFin(new \DateTime('30-06-2015'));
               $manager->persist($ciclo);

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
								}

        $manager->flush();
    }
}
