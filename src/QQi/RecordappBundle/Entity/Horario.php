<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Horario
 *
 * @ORM\Table(name="horario")
 * @ORM\Entity
 */
class Horario
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
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_CREACION", type="date", nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var \Estados
     *
     * @ORM\ManyToOne(targetEntity="Estados", inversedBy="Estados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTADO", referencedColumnName="ID")
     * })
     */
    private $idEstado;

    /**
     * @var \Ciclo
     *
     * @ORM\ManyToOne(targetEntity="Ciclo", inversedBy="Ciclos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CICLO", referencedColumnName="ID")
     * })
     */
    private $idCiclo;

    /**
     * @var \Escuela
     *
     * @ORM\ManyToOne(targetEntity="Escuelas", inversedBy="Escuelas2")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESCUELA", referencedColumnName="ID")
     * })
     */
    private $idEscuela;

    /**
    *@ORM\OneToMany(targetEntity="Horarioasignatura", mappedBy="idHorario")
    */
    protected $Horarios;

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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Horario
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set idEstado
     *
     * @param \QQi\RecordappBundle\Entity\Estados $idEstado
     * @return Horario
     */
    public function setIdEstado(\QQi\RecordappBundle\Entity\Estados $idEstado = null)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \QQi\RecordappBundle\Entity\Estados
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idCiclo
     *
     * @param \QQi\RecordappBundle\Entity\Ciclo $idCiclo
     * @return Horario
     */
    public function setIdCiclo(\QQi\RecordappBundle\Entity\Ciclo $idCiclo = null)
    {
        $this->idCiclo = $idCiclo;

        return $this;
    }

    /**
     * Get idCiclo
     *
     * @return \QQi\RecordappBundle\Entity\Ciclo
     */
    public function getIdCiclo()
    {
        return $this->idCiclo;
    }

    /**
     * Set idEscuela
     *
     * @param \QQi\RecordappBundle\Entity\Escuelas $idEscuela
     * @return Horario
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
    public function __toString()
    {
          return $this->fechaCreacion->format('y-m-d');
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Horarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add Horarios
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $horarios
     * @return Horario
     */
    public function addHorario(\QQi\RecordappBundle\Entity\Horarioasignatura $horarios)
    {
        $this->Horarios[] = $horarios;
    
        return $this;
    }

    /**
     * Remove Horarios
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $horarios
     */
    public function removeHorario(\QQi\RecordappBundle\Entity\Horarioasignatura $horarios)
    {
        $this->Horarios->removeElement($horarios);
    }

    /**
     * Get Horarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHorarios()
    {
        return $this->Horarios;
    }
}