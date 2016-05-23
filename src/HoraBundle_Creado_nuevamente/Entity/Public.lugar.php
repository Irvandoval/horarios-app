<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.lugar
 *
 * @ORM\Table(name="public.lugar")
 * @ORM\Entity
 */
class Public.lugar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_lugar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.lugar_id_lugar_seq", allocationSize=1, initialValue=1)
     */
    private $idLugar;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="cupo", type="integer", nullable=true)
     */
    private $cupo;

    /**
     * @var \Tipolugar
     *
     * @ORM\ManyToOne(targetEntity="Tipolugar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_lugar", referencedColumnName="id_tipo_lugar")
     * })
     */
    private $idTipoLugar;

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
