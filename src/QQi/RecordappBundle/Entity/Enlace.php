<?php

namespace QQi\RecordappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Table(name="enlace")
* @ORM\Entity()
*/
class Enlace
{
	/**
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;

	/**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
	protected $titulo;

	/**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $url;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $fecha;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", cascade={"all"})
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $usuario;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    public function __construct()
    {
    	$this->created_at = new \DateTime('now');
    	$this->updated_at = new \DateTime('now');
    }

    public function __toString()
    {
    	return $this->titulo;
    }

    public function getId()
    {
    	return $this->id;
    }

    public function getTitulo()
    {
    	return $this->titulo;
    }

    public function setTitulo($titulo)
    {
    	$this->titulo = $titulo;
    }

    public function getUrl()
    {
    	return $this->url;
    }

    public function setUrl($url)
    {
    	$this->url = $url;
    }

    public function getFecha()
    {
    	return $this->fecha;
    }

    public function setFecha($fecha)
    {
    	$this->fecha = $fecha;
    }

    public function getEstado()
    {
    	return $this->estado;
    }

    public function setEstado($estado)
    {
    	$this->estado = $estado;
    }

    public function getUsuario()
    {
    	return $this->usuario;
    }

    public function setUsuario(\QQi\RecordappBundle\Entity\Usuario $usuario)
    {
    	$this->usuario = $usuario;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Enlace
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Enlace
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}