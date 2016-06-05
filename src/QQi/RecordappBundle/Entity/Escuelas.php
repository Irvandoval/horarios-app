<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Escuelas
 *
 * @ORM\Table(name="escuelas")
 * @ORM\Entity
 */
class Escuelas
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
     * @ORM\Column(name="NOMBRE", type="string", length=150, nullable=true)
     */
     /**
     *@Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var \Facultad
     *
     * @ORM\ManyToOne(targetEntity="Facultad")
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
     * @return Escuelas
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
     * @return Escuelas
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
     * Constructor
     */
    public function __construct()
    {
        $this->Escuelas2 = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
    *@ORM\OneToMany(targetEntity="Horario", mappedBy="idEscuelas")
    */
    protected $Escuelas2;

    /**
     * Add Escuelas2
     *
     * @param \QQi\RecordappBundle\Entity\Horario $escuelas2
     * @return Escuelas
     */
    public function addEscuelas2(\QQi\RecordappBundle\Entity\Horario $escuelas2)
    {
        $this->Escuelas2[] = $escuelas2;

        return $this;
    }

    /**
     * Remove Escuelas2
     *
     * @param \QQi\RecordappBundle\Entity\Horario $escuelas2
     */
    public function removeEscuelas2(\QQi\RecordappBundle\Entity\Horario $escuelas2)
    {
        $this->Escuelas2->removeElement($escuelas2);
    }

    /**
     * Get Escuelas2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEscuelas2()
    {
        return $this->Escuelas2;
    }
    public function __toString()
    {
          return $this->nombre;
    }
}
