<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Actividad
 *
 * @ORM\Table(name="actividad")
 * @ORM\Entity
 */
class Actividad
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
     * @var \Horarioasignatura
     *
     * @ORM\ManyToOne(targetEntity="Horarioasignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_HOASIG", referencedColumnName="ID")
     * })
     */
    private $idHoasig;

    /**
     * @var \Tipoactividad
     *
     * @ORM\ManyToOne(targetEntity="Tipoactividad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPOACTIVIDAD", referencedColumnName="ID")
     * })
     */
    private $idTipoactividad;

    /**
     * @var \Lugar
     *
     * @ORM\ManyToOne(targetEntity="Lugar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_LUGAR", referencedColumnName="ID")
     * })
     */
    private $idLugar;

    /**
     * @var \Diahora
     *
     * @ORM\ManyToOne(targetEntity="Diahora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DIAHORA", referencedColumnName="ID")
     * })
     */
    private $idDiahora;



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
     * Set idHoasig
     *
     * @param \QQi\RecordappBundle\Entity\Horarioasignatura $idHoasig
     * @return Actividad
     */
    public function setIdHoasig(\QQi\RecordappBundle\Entity\Horarioasignatura $idHoasig = null)
    {
        $this->idHoasig = $idHoasig;
    
        return $this;
    }

    /**
     * Get idHoasig
     *
     * @return \QQi\RecordappBundle\Entity\Horarioasignatura 
     */
    public function getIdHoasig()
    {
        return $this->idHoasig;
    }

    /**
     * Set idTipoactividad
     *
     * @param \QQi\RecordappBundle\Entity\Tipoactividad $idTipoactividad
     * @return Actividad
     */
    public function setIdTipoactividad(\QQi\RecordappBundle\Entity\Tipoactividad $idTipoactividad = null)
    {
        $this->idTipoactividad = $idTipoactividad;
    
        return $this;
    }

    /**
     * Get idTipoactividad
     *
     * @return \QQi\RecordappBundle\Entity\Tipoactividad 
     */
    public function getIdTipoactividad()
    {
        return $this->idTipoactividad;
    }

    /**
     * Set idLugar
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $idLugar
     * @return Actividad
     */
    public function setIdLugar(\QQi\RecordappBundle\Entity\Lugar $idLugar = null)
    {
        $this->idLugar = $idLugar;
    
        return $this;
    }

    /**
     * Get idLugar
     *
     * @return \QQi\RecordappBundle\Entity\Lugar 
     */
    public function getIdLugar()
    {
        return $this->idLugar;
    }

    /**
     * Set idDiahora
     *
     * @param \QQi\RecordappBundle\Entity\Diahora $idDiahora
     * @return Actividad
     */
    public function setIdDiahora(\QQi\RecordappBundle\Entity\Diahora $idDiahora = null)
    {
        $this->idDiahora = $idDiahora;
    
        return $this;
    }

    /**
     * Get idDiahora
     *
     * @return \QQi\RecordappBundle\Entity\Diahora 
     */
    public function getIdDiahora()
    {
        return $this->idDiahora;
    }
}