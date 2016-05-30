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
}