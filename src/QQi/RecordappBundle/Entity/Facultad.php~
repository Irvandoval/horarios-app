<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Facultad
 *
 * @ORM\Table(name="facultad")
 * @ORM\Entity
 */
class Facultad
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
     * @ORM\Column(name="NOMBRE", type="string", length=100, nullable=false)
     */
    private $nombre;



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
     * @return Facultad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
	public function __toString()
    {
        return $this->nombre;
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
    *@ORM\OneToMany(targetEntity="Lugar", mappedBy="idFacultad")
    */
    protected $lugares;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lugares = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lugares
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $lugares
     * @return Facultad
     */
    public function addLugare(\QQi\RecordappBundle\Entity\Lugar $lugares)
    {
        $this->lugares[] = $lugares;

        return $this;
    }

    /**
     * Remove lugares
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $lugares
     */
    public function removeLugare(\QQi\RecordappBundle\Entity\Lugar $lugares)
    {
        $this->lugares->removeElement($lugares);
    }

    /**
     * Get lugares
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLugares()
    {
        return $this->lugares;
    }
}