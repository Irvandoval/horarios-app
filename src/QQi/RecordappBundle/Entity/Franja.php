<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * franja
 *
 * @ORM\Table(name="franja")
 * @ORM\Entity
 */
class Franja
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
     * @ORM\Column(name="NOMBRE", type="string", length=20, nullable=true)
     *@Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_INICIO", type="time", nullable=true)
     *@Assert\NotBlank()
     */
    private $hora_inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_FIN", type="time", nullable=true)
     *@Assert\NotBlank()
     */
    private $hora_fin;

    /**
     * @var \Ciclo
     *
     * @ORM\ManyToOne(targetEntity="Ciclo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CICLO", referencedColumnName="ID")
     * })
     *@Assert\NotBlank()
     */
    private $idCiclo;



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
     * @return Franja
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
     * Set hora_inicio
     *
     * @param \DateTime $horaInicio
     * @return Franja
     */
    public function setHoraInicio($horaInicio)
    {
        $this->hora_inicio = $horaInicio;

        return $this;
    }

    /**
     * Get hora_inicio
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Set hora_fin
     *
     * @param \DateTime $horaFin
     * @return Franja
     */
    public function setHoraFin($horaFin)
    {
        $this->hora_fin = $horaFin;

        return $this;
    }

    /**
     * Get hora_fin
     *
     * @return \DateTime
     */
    public function getHoraFin()
    {
        return $this->hora_fin;
    }

    /**
     * Set idCiclo
     *
     * @param \QQi\RecordappBundle\Entity\Ciclo $idCiclo
     * @return Franja
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
    public function __toString()
      {
          return $this->hora_inicio->format('G:ia')." a ".$this->hora_fin->format('G:ia');
      }
}