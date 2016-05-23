<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.escuelas
 *
 * @ORM\Table(name="public.escuelas")
 * @ORM\Entity
 */
class Public.escuelas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_escuela", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.escuelas_id_escuela_seq", allocationSize=1, initialValue=1)
     */
    private $idEscuela;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=true)
     */
    private $nombre;

    /**
     * @var \Facultad
     *
     * @ORM\ManyToOne(targetEntity="Facultad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_facultad", referencedColumnName="id_facultad")
     * })
     */
    private $idFacultad;


}
