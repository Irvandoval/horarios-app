<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Horarioasignatura
 *
 * @ORM\Table(name="horarioasignatura")
 * @ORM\Entity
 */
class Horarioasignatura
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
     * @var float
     *
     * @ORM\Column(name="CORRELATIVO", type="decimal", nullable=false)
     */
    private $correlativo;

    /**
     * @var \Horario
     *
     * @ORM\ManyToOne(targetEntity="Horario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_HORARIO", referencedColumnName="ID")
     * })
     */
    private $idHorario;

    /**
     * @var \Asignatura
     *
     * @ORM\ManyToOne(targetEntity="Asignatura", inversedBy="asignaturas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ASIGNATURA", referencedColumnName="ID")
     * })
     */
    private $idAsignatura;


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
     * Set correlativo
     *
     * @param float $correlativo
     * @return Horarioasignatura
     */
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;

        return $this;
    }

    /**
     * Get correlativo
     *
     * @return float
     */
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * Set idHorario
     *
     * @param \QQi\RecordappBundle\Entity\Horario $idHorario
     * @return Horarioasignatura
     */
    public function setIdHorario(\QQi\RecordappBundle\Entity\Horario $idHorario = null)
    {
        $this->idHorario = $idHorario;

        return $this;
    }

    /**
     * Get idHorario
     *
     * @return \QQi\RecordappBundle\Entity\Horario
     */
    public function getIdHorario()
    {
        return $this->idHorario;
    }

    /**
     * Set idAsignatura
     *
     * @param \QQi\RecordappBundle\Entity\Asignatura $idAsignatura
     * @return Horarioasignatura
     */
    public function setIdAsignatura(\QQi\RecordappBundle\Entity\Asignatura $idAsignatura = null)
    {
        $this->idAsignatura = $idAsignatura;

        return $this;
    }

    /**
     * Get idAsignatura
     *
     * @return \QQi\RecordappBundle\Entity\Asignatura
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }
}