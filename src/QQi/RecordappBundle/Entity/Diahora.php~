<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Diahora
 *
 * @ORM\Table(name="diahora")
 * @ORM\Entity
 */
class Diahora
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
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="DIA", type="integer", nullable=true)
     */
    private $dia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var \Ciclo
     *
     * @ORM\ManyToOne(targetEntity="Ciclo", inversedBy="ciclos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CICLO", referencedColumnName="ID")
     * })
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
     * @return Diahora
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
     * Set dia
     *
     * @param integer $dia
     * @return Diahora
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return integer
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Diahora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set idCiclo
     *
     * @param \QQi\RecordappBundle\Entity\Ciclo $idCiclo
     * @return Diahora
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
          return $this->nombre;
    }

}