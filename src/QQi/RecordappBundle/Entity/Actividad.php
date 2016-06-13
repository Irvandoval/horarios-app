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
     * @var integer
     *
     * @ORM\Column(name="numero_grupo", type="integer", nullable=false)
     *@Assert\NotBlank()
     */
    private $numero_grupo;

    /**
     * @var \Franja
     *
     * @ORM\ManyToOne(targetEntity="Franja")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FRANJA", referencedColumnName="ID")
     * })
     */
    private $idFranja;

    /**
     * @var \Dia
     *
     * @ORM\ManyToOne(targetEntity="Dia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DIA", referencedColumnName="ID")
     * })
     */
    private $idDia;




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
     * Set numero_grupo
     *
     * @param integer $numeroGrupo
     * @return Actividad
     */
    public function setNumeroGrupo($numeroGrupo)
    {
        $this->numero_grupo = $numeroGrupo;

        return $this;
    }

    /**
     * Get numero_grupo
     *
     * @return integer
     */
    public function getNumeroGrupo()
    {
        return $this->numero_grupo;
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
     * Set idFranja
     *
     * @param \QQi\RecordappBundle\Entity\Franja $idFranja
     * @return Actividad
     */
    public function setIdFranja(\QQi\RecordappBundle\Entity\Franja $idFranja = null)
    {
        $this->idFranja = $idFranja;

        return $this;
    }

    /**
     * Get idFranja
     *
     * @return \QQi\RecordappBundle\Entity\Franja
     */
    public function getIdFranja()
    {
        return $this->idFranja;
    }

    /**
     * Set idDia
     *
     * @param \QQi\RecordappBundle\Entity\Dia $idDia
     * @return Actividad
     */
    public function setIdDia(\QQi\RecordappBundle\Entity\Dia $idDia = null)
    {
        $this->idDia = $idDia;

        return $this;
    }

    /**
     * Get idDia
     *
     * @return \QQi\RecordappBundle\Entity\Dia
     */
    public function getIdDia()
    {
        return $this->idDia;
    }
}