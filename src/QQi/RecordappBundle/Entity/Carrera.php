<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Carrera
 *
 * @ORM\Table(name="carrera")
 * @ORM\Entity
 */
class Carrera
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
     * @ORM\Column(name="NOMBRE", type="string", length=75, nullable=false)
     */
    private $nombre;

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
     * @return Carrera
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
     * Set idFacultad
     *
     * @param \QQi\RecordappBundle\Entity\Facultad $idFacultad
     * @return Carrera
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
    *@ORM\OneToMany(targetEntity="Pensum", mappedBy="idCarrera")
    */
    protected $Carreras;

    /**
    *@ORM\OneToMany(targetEntity="Horario", mappedBy="idCarrera")
    */
    protected $Carreras;

    public function __toString()
    {
          return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Carreras = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Carreras
     *
     * @param \QQi\RecordappBundle\Entity\Pensum $carreras
     * @return Carrera
     */
    public function addCarrera(\QQi\RecordappBundle\Entity\Pensum $carreras)
    {
        $this->Carreras[] = $carreras;

        return $this;
    }

    /**
     * Remove Carreras
     *
     * @param \QQi\RecordappBundle\Entity\Pensum $carreras
     */
    public function removeCarrera(\QQi\RecordappBundle\Entity\Pensum $carreras)
    {
        $this->Carreras->removeElement($carreras);
    }

    /**
     * Get Carreras
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarreras()
    {
        return $this->Carreras;
    }
}
