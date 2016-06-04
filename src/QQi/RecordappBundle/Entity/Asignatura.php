<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura")
 * @ORM\Entity
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
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=20, nullable=false)
     */
    private $codigo;



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
}
