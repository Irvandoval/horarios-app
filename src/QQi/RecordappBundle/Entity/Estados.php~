<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Estados
 *
 * @ORM\Table(name="estados")
 * @ORM\Entity
 */
class Estados
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
     * @ORM\Column(name="NOMBRE", type="string", length=30, nullable=true)
     *@Assert\NotBlank()
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
     * @return Estados
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
    *@ORM\OneToMany(targetEntity="Horario", mappedBy="idEstados")
    */
    protected $Estadoss;
    public function __toString()
    {
          return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Estadoss = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Estadoss
     *
     * @param \QQi\RecordappBundle\Entity\Horario $estadoss
     * @return Estados
     */
    public function addEstados(\QQi\RecordappBundle\Entity\Horario $estadoss)
    {
        $this->Estadoss[] = $estadoss;

        return $this;
    }

    /**
     * Remove Estadoss
     *
     * @param \QQi\RecordappBundle\Entity\Horario $estadoss
     */
    public function removeEstados(\QQi\RecordappBundle\Entity\Horario $estadoss)
    {
        $this->Estadoss->removeElement($estadoss);
    }

    /**
     * Get Estadoss
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstadoss()
    {
        return $this->Estadoss;
    }
}