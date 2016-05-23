<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.tipolugar
 *
 * @ORM\Table(name="public.tipolugar")
 * @ORM\Entity
 */
class Public.tipolugar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_lugar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.tipolugar_id_tipo_lugar_seq", allocationSize=1, initialValue=1)
     */
    private $idTipoLugar;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;


}
