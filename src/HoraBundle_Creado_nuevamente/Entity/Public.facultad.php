<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.facultad
 *
 * @ORM\Table(name="public.facultad")
 * @ORM\Entity
 */
class Public.facultad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_facultad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.facultad_id_facultad_seq", allocationSize=1, initialValue=1)
     */
    private $idFacultad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;


}
