<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
/**
* @ORM\Table(name="usuario")
* @ORM\Entity()
* @UniqueEntity(fields="email")
*/
class Usuario implements UserInterface, \Serializable, AdvancedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     * @Assert\MaxLength(20)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     * @Assert\MaxLength(20)
     */
    protected $apellido;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MinLength(5)
     * @Assert\MaxLength(15)
     */
    protected $password;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $activo;

    /**
     * @ORM\ManyToMany(targetEntity="Rol", cascade={"persist"})
     * @ORM\JoinTable(name="usuario_rol",
     *     joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="rol_id", referencedColumnName="id")}
     * )
     */
    protected $usuario_rol;

    /**
     * @ORM\OneToMany(targetEntity="Tarea", mappedBy="tarea")
     */
    protected $tareas;

    /**
     * @ORM\OneToMany(targetEntity="Enlace", mappedBy="enlace")
     */
    protected $enlaces;

    /**
     * @var \Escuela
     *
     * @ORM\ManyToOne(targetEntity="Escuelas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESCUELA", referencedColumnName="ID")
     * })
     */
    private $idEscuela;

    /**
    *@ORM\OneToMany(targetEntity="Asignatura", mappedBy="usuario")
    */
    protected $asignatura;


    public function __construct()
    {
        $this->tareas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enlaces = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->usuario_rol = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->activo = true;
    }

    public function addTareas(\QQi\RecordappBundle\Entity\Tarea $tarea)
    {
        $this->tareas[] = $tarea;
    }

    public function getTareas()
    {
        return $this->tareas;
    }

    public function addEnlaces(\QQi\RecordappBundle\Entity\Enlace $enlace)
    {
        $this->enlaces[] = $enlace;
    }

    public function getEnlaces()
    {
        return $this->enlaces;
    }

    public function addRole(\QQi\RecordappBundle\Entity\Rol $roles)
    {
    	$this->usuario_rol[] = $roles;
    }

    public function setUsuarioRol($roles)
    {
    	$this->usuario_rol = $roles;
    }

    public function getUsuarioRol()
    {
    	return $this->usuario_rol;
    }

    public function getRoles()
    {
    	return $this->usuario_rol->toArray();
        #return array('ROLE_USER');
    }

    public function __toString()
    {
    	return $this->email;
    }

    public function serialize()
    {
    	return serialize(array(
    		$this->getId()
    		));
    }

    public function unserialize($serialized)
    {
    	$arr = unserialize($serialized);
    	$this->id = ($arr[0]);
    }

    public function getId()
    {
    	return $this->id;
    }

    public function getNombre()
    {
    	return $this->nombre;
    }

    public function setNombre($nombre)
    {
    	$this->nombre = $nombre;
    }

    public function getApellido()
    {
    	return $this->apellido;
    }

    public function setApellido($apellido)
    {
    	$this->apellido = $apellido;
    }

    public function getEmail()
    {
    	return $this->email;
    }

    public function setEmail($email)
    {
    	$this->email = $email;
    }

    public function getPassword()
    {
    	return $this->password;
    }

    public function setPassword($password)
    {
    	$this->password = $password;
    }

    public function getSalt()
    {
    	return false;
    }

    public function getUsername()
    {
    	return $this->email;
    }

    public function eraseCredentials()
    {

    }

    public function equals(UserInterface $user)
    {
    	return $user->getUsername() == $this->getUsername();
    }

    public function getActivo()
    {
    	return $this->activo;
    }

    public function setActivo($activo)
    {
    	$this->activo = $activo;
    }

    public function isAccountNonExpired()
    {
    	return true;
    }

    public function isAccountNonLocked()
    {
    	return true;
    }

    public function isCredentialsNonExpired()
    {
    	return true;
    }

    public function isEnabled()
    {
    	return $this->activo;
    }


    /**
     * Add usuario_rol
     *
     * @param \QQi\RecordappBundle\Entity\Rol $usuarioRol
     * @return Usuario
     */
    public function addUsuarioRol(\QQi\RecordappBundle\Entity\Rol $usuarioRol)
    {
        $this->usuario_rol[] = $usuarioRol;

        return $this;
    }

    /**
     * Remove usuario_rol
     *
     * @param \QQi\RecordappBundle\Entity\Rol $usuarioRol
     */
    public function removeUsuarioRol(\QQi\RecordappBundle\Entity\Rol $usuarioRol)
    {
        $this->usuario_rol->removeElement($usuarioRol);
    }

    /**
     * Add tareas
     *
     * @param \QQi\RecordappBundle\Entity\Tarea $tareas
     * @return Usuario
     */
    public function addTarea(\QQi\RecordappBundle\Entity\Tarea $tareas)
    {
        $this->tareas[] = $tareas;

        return $this;
    }

    /**
     * Remove tareas
     *
     * @param \QQi\RecordappBundle\Entity\Tarea $tareas
     */
    public function removeTarea(\QQi\RecordappBundle\Entity\Tarea $tareas)
    {
        $this->tareas->removeElement($tareas);
    }

    /**
     * Add enlaces
     *
     * @param \QQi\RecordappBundle\Entity\Enlace $enlaces
     * @return Usuario
     */
    public function addEnlace(\QQi\RecordappBundle\Entity\Enlace $enlaces)
    {
        $this->enlaces[] = $enlaces;

        return $this;
    }

    /**
     * Remove enlaces
     *
     * @param \QQi\RecordappBundle\Entity\Enlace $enlaces
     */
    public function removeEnlace(\QQi\RecordappBundle\Entity\Enlace $enlaces)
    {
        $this->enlaces->removeElement($enlaces);
    }


    /**
     * Set idEscuelas
     *
     * @param \QQi\RecordappBundle\Entity\Escuelas $idEscuelas
     * @return Usuario
     */
    public function setIdEscuelas(\QQi\RecordappBundle\Entity\Escuelas $idEscuelas = null)
    {
        $this->idEscuelas = $idEscuelas;

        return $this;
    }

    /**
     * Get idEscuelas
     *
     * @return \QQi\RecordappBundle\Entity\Escuelas
     */
    public function getIdEscuelas()
    {
        return $this->idEscuelas;
    }

    /**
     * Add Asignaturas
     *
     * @param \QQi\RecordappBundle\Entity\Asignatura $asignaturas
     * @return Usuario
     */
    public function addAsignatura(\QQi\RecordappBundle\Entity\Asignatura $asignatura)
    {
        $this->Asignatura[] = $asignatura;

        return $this;
    }

    /**
     * Remove Asignaturas
     *
     * @param \QQi\RecordappBundle\Entity\Asignatura $asignaturas
     */
    public function removeAsignatura(\QQi\RecordappBundle\Entity\Asignatura $asignatura)
    {
        $this->Asignatura->removeElement($asignatura);
    }

    /**
     * Get Asignaturas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignatura()
    {
        return $this->Asignatura;
    }

    /**
     * Set idEscuela
     *
     * @param \QQi\RecordappBundle\Entity\Escuelas $idEscuela
     * @return Usuario
     */
    public function setIdEscuela(\QQi\RecordappBundle\Entity\Escuelas $idEscuela = null)
    {
        $this->idEscuela = $idEscuela;

        return $this;
    }

    /**
     * Get idEscuela
     *
     * @return \QQi\RecordappBundle\Entity\Escuelas
     */
    public function getIdEscuela()
    {
        return $this->idEscuela;
    }
}
