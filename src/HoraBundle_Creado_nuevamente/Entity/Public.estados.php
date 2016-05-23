<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.estados
 *
 * @ORM\Table(name="public.estados")
 * @ORM\Entity
 */
class Public.estados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.estados_id_estado_seq", allocationSize=1, initialValue=1)
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=true)
     */
    private $nombre;


}
