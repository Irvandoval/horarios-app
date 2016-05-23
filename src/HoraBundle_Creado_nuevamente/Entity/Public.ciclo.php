<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.ciclo
 *
 * @ORM\Table(name="public.ciclo")
 * @ORM\Entity
 */
class Public.ciclo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ciclo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.ciclo_id_ciclo_seq", allocationSize=1, initialValue=1)
     */
    private $idCiclo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=15, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     */
    private $fechaFin;


}
