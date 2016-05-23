<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.asignatura
 *
 * @ORM\Table(name="public.asignatura")
 * @ORM\Entity
 */
class Public.asignatura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_asignatura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.asignatura_id_asignatura_seq", allocationSize=1, initialValue=1)
     */
    private $idAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=false)
     */
    private $codigo;


}
