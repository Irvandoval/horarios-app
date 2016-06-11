<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura")
 * @ORM\Entity
 * @UniqueEntity(fields={"codigo"}, message="Este campo ya existe en el sistema")
 */
class Asignatura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=50, nullable=false)
     *@Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=20, nullable=false, unique=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *               pattern="/([A-Z]){3}\d{3}$/",
     *               match=true,
     *               message="Código de asignatura inválido")
     */
    private $codigo;

    /**
     * @ManyToMany(targetEntity="Usuario", mappedBy="Asignatura")
     */
    private $usuario;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Asignatura
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Asignatura
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
    /**
    *@ORM\OneToMany(targetEntity="Pensum", mappedBy="idAsignatura")
    */
    protected $Asignaturas;

    /**
    *@ORM\OneToMany(targetEntity="Horarioasignatura", mappedBy="idAsignatura")
    */
    protected $Asignaturas2;

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
     * Constructor
     */
    public function __construct()
    {
        $this->asignaturas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add asignaturas
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas
     * @return Asignatura
     */
    public function addAsignatura(\QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas)
    {
        $this->asignaturas[] = $asignaturas;

        return $this;
    }

    /**
     * Remove asignaturas
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas
     */
    public function removeAsignatura(\QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas)
    {
        $this->asignaturas->removeElement($asignaturas);
    }

    /**
     * Get asignaturas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaturas()
    {
        return $this->asignaturas;
    }
    /**
    *@ORM\OneToMany(targetEntity="Lugar", mappedBy="idAsignatura")
    */
    protected $asignaturass;

    public function __toString()
    {
          return $this->nombre;
    }

    /**
     * Add asignaturass
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $asignaturass
     * @return Asignatura
     */
    public function addAsignaturas(\QQi\RecordappBundle\Entity\Lugar $asignaturass)
    {
        $this->asignaturass[] = $asignaturass;

        return $this;
    }

    /**
     * Remove asignaturass
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $asignaturass
     */
    public function removeAsignaturas(\QQi\RecordappBundle\Entity\Lugar $asignaturass)
    {
        $this->asignaturass->removeElement($asignaturass);
    }

    /**
     * Get asignaturass
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaturass()
    {
        return $this->asignaturass;
    }

    /**
     * Add Asignaturas2
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas2
     * @return Asignatura
     */
    public function addAsignaturas2(\QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas2)
    {
        $this->Asignaturas2[] = $asignaturas2;

        return $this;
    }

    /**
     * Remove Asignaturas2
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas2
     */
    public function removeAsignaturas2(\QQi\RecordappBundle\Entity\Horarioasignatura $asignaturas2)
    {
        $this->Asignaturas2->removeElement($asignaturas2);
    }

    /**
     * Get Asignaturas2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaturas2()
    {
        return $this->Asignaturas2;
    }

    /**
     * Set idEscuela
     *
     * @param \QQi\RecordappBundle\Entity\Escuelas $idEscuela
     * @return Asignatura
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

    /**
     * Add usuario
     *
     * @param \QQi\RecordappBundle\Entity\Usuario $usuario
     * @return Asignatura
     */
    public function addUsuario(\QQi\RecordappBundle\Entity\Usuario $usuario)
    {
        $this->usuario[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario
     *
     * @param \QQi\RecordappBundle\Entity\Usuario $usuario
     */
    public function removeUsuario(\QQi\RecordappBundle\Entity\Usuario $usuario)
    {
        $this->usuario->removeElement($usuario);
    }

    /**
     * Get usuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
