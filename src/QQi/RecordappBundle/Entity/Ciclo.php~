<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ciclo
 *
 * @ORM\Table(name="ciclo")
 * @ORM\Entity
 */
class Ciclo
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
     * @ORM\Column(name="NOMBRE", type="string", length=15, nullable=false)
     *@Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_INICIO", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_FIN", type="date", nullable=false)
     */
    private $fechaFin;



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
     * @return Ciclo
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Ciclo
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Ciclo
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
    /**
    *@ORM\OneToMany(targetEntity="Diahora", mappedBy="idCiclo")
    */
    protected $Ciclos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ciclos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ciclos
     *
     * @param \QQi\RecordappBundle\Entity\Diahora $ciclos
     * @return Ciclo
     */
    public function addCiclo(\QQi\RecordappBundle\Entity\Diahora $ciclos)
    {
        $this->ciclos[] = $ciclos;

        return $this;
    }

    /**
     * Remove ciclos
     *
     * @param \QQi\RecordappBundle\Entity\Diahora $ciclos
     */
    public function removeCiclo(\QQi\RecordappBundle\Entity\Diahora $ciclos)
    {
        $this->ciclos->removeElement($ciclos);
    }

    /**
     * Get ciclos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCiclos()
    {
        return $this->ciclos;
    }
		public function __toString()
    {
        return $this->nombre;
    }
}