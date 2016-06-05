<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pensum
 *
 * @ORM\Table(name="pensum")
 * @ORM\Entity
 */
class Pensum
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
     * @var integer
     *
     * @ORM\Column(name="NIVEL", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ACTIVA", type="boolean", nullable=true)
     */
    private $activa;

    /**
     * @var string
     *
     * @ORM\Column(name="PLAN", type="string", length=25, nullable=true)
     */
     /**
     *@Assert\NotBlank()
     */
    private $plan;

    /**
     * @var boolean
     *
     * @ORM\Column(name="VIGENTE", type="boolean", nullable=true)
     */
    private $vigente;

    /**
     * @var \Asignatura
     *
     * @ORM\ManyToOne(targetEntity="Asignatura", inversedBy="Asignaturas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ASIGNATURA", referencedColumnName="ID")
     * })
     */
    private $idAsignatura;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera", inversedBy="Carreras")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CARRERA", referencedColumnName="ID")
     * })
     */
    private $idCarrera;



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
     * Set nivel
     *
     * @param integer $nivel
     * @return Pensum
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set activa
     *
     * @param boolean $activa
     * @return Pensum
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Get activa
     *
     * @return boolean
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set plan
     *
     * @param string $plan
     * @return Pensum
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set vigente
     *
     * @param boolean $vigente
     * @return Pensum
     */
    public function setVigente($vigente)
    {
        $this->vigente = $vigente;

        return $this;
    }

    /**
     * Get vigente
     *
     * @return boolean
     */
    public function getVigente()
    {
        return $this->vigente;
    }

    /**
     * Set idAsignatura
     *
     * @param \QQi\RecordappBundle\Entity\Asignatura $idAsignatura
     * @return Pensum
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

    /**
     * Set idCarrera
     *
     * @param \QQi\RecordappBundle\Entity\Carrera $idCarrera
     * @return Pensum
     */
    public function setIdCarrera(\QQi\RecordappBundle\Entity\Carrera $idCarrera = null)
    {
        $this->idCarrera = $idCarrera;

        return $this;
    }

    /**
     * Get idCarrera
     *
     * @return \QQi\RecordappBundle\Entity\Carrera
     */
    public function getIdCarrera()
    {
        return $this->idCarrera;
    }
}
