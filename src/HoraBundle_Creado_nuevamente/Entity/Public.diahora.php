<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.diahora
 *
 * @ORM\Table(name="public.diahora")
 * @ORM\Entity
 */
class Public.diahora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_diahora", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.diahora_id_diahora_seq", allocationSize=1, initialValue=1)
     */
    private $idDiahora;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="dia", type="integer", nullable=true)
     */
    private $dia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var \Ciclo
     *
     * @ORM\ManyToOne(targetEntity="Ciclo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ciclo", referencedColumnName="id_ciclo")
     * })
     */
    private $idCiclo;


}
