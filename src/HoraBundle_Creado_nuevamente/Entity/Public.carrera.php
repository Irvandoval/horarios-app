<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.carrera
 *
 * @ORM\Table(name="public.carrera")
 * @ORM\Entity
 */
class Public.carrera
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_carrera", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.carrera_id_carrera_seq", allocationSize=1, initialValue=1)
     */
    private $idCarrera;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=75, nullable=false)
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
