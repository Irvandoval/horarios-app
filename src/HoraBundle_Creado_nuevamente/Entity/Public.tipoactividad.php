<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.tipoactividad
 *
 * @ORM\Table(name="public.tipoactividad")
 * @ORM\Entity
 */
class Public.tipoactividad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_actividad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.tipoactividad_id_tipo_actividad_seq", allocationSize=1, initialValue=1)
     */
    private $idTipoActividad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;


}
