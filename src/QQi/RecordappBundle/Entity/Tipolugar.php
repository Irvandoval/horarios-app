<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tipolugar
 *
 * @ORM\Table(name="tipolugar")
 * @ORM\Entity
 */
class Tipolugar
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
     /**
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
     * @return Tipolugar
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
	public function __toString()
    {
          return $this->nombre;
    }
	/**
    *@ORM\OneToMany(targetEntity="Lugar", mappedBy="idTipolugar")
    */
    protected $idTipolugar;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTipolugar = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idTipolugar
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $idTipolugar
     * @return Tipolugar
     */
    public function addIdTipolugar(\QQi\RecordappBundle\Entity\Lugar $idTipolugar)
    {
        $this->idTipolugar[] = $idTipolugar;

        return $this;
    }

    /**
     * Remove idTipolugar
     *
     * @param \QQi\RecordappBundle\Entity\Lugar $idTipolugar
     */
    public function removeIdTipolugar(\QQi\RecordappBundle\Entity\Lugar $idTipolugar)
    {
        $this->idTipolugar->removeElement($idTipolugar);
    }

    /**
     * Get idTipolugar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTipolugar()
    {
        return $this->idTipolugar;
    }
}
