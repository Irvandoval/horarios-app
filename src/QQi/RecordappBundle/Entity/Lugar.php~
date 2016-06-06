<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Lugar
 *
 * @ORM\Table(name="lugar")
 * @ORM\Entity
 */
class Lugar
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
     * @ORM\Column(name="NOMBRE", type="string", length=100, nullable=true)
     *@Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUPO", type="integer", nullable=true)
     *@Assert\NotBlank()
     */
    private $cupo;

    /**
     * @var \Facultad
     *
     * @ORM\ManyToOne(targetEntity="Facultad", inversedBy="lugares")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FACULTAD", referencedColumnName="ID")
     * })
     */
    private $idFacultad;

    /**
     * @var \Tipolugar
     *
     * @ORM\ManyToOne(targetEntity="Tipolugar", inversedBy="tipolugares")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPOLUGAR", referencedColumnName="ID")
     * })
     */
    private $idTipolugar;



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
     * @return Lugar
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
     * Set cupo
     *
     * @param integer $cupo
     * @return Lugar
     */
    public function setCupo($cupo)
    {
        $this->cupo = $cupo;

        return $this;
    }

    /**
     * Get cupo
     *
     * @return integer
     */
    public function getCupo()
    {
        return $this->cupo;
    }

    /**
     * Set idFacultad
     *
     * @param \QQi\RecordappBundle\Entity\Facultad $idFacultad
     * @return Lugar
     */
    public function setIdFacultad(\QQi\RecordappBundle\Entity\Facultad $idFacultad = null)
    {
        $this->idFacultad = $idFacultad;

        return $this;
    }

    /**
     * Get idFacultad
     *
     * @return \QQi\RecordappBundle\Entity\Facultad
     */
    public function getIdFacultad()
    {
        return $this->idFacultad;
    }

    /**
     * Set idTipolugar
     *
     * @param \QQi\RecordappBundle\Entity\Tipolugar $idTipolugar
     * @return Lugar
     */
    public function setIdTipolugar(\QQi\RecordappBundle\Entity\Tipolugar $idTipolugar = null)
    {
        $this->idTipolugar = $idTipolugar;

        return $this;
    }

    /**
     * Get idTipolugar
     *
     * @return \QQi\RecordappBundle\Entity\Tipolugar
     */
    public function getIdTipolugar()
    {
        return $this->idTipolugar;
    }
    public function __toString()
    {
          return $this->nombre;
    }

}