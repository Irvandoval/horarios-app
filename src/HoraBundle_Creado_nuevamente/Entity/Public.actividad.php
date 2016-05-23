<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.actividad
 *
 * @ORM\Table(name="public.actividad")
 * @ORM\Entity
 */
class Public.actividad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_actividad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.actividad_id_actividad_seq", allocationSize=1, initialValue=1)
     */
    private $idActividad;

    /**
     * @var \Tipoactividad
     *
     * @ORM\ManyToOne(targetEntity="Tipoactividad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_actividad", referencedColumnName="id_tipo_actividad")
     * })
     */
    private $idTipoActividad;

    /**
     * @var \Lugar
     *
     * @ORM\ManyToOne(targetEntity="Lugar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lugar", referencedColumnName="id_lugar")
     * })
     */
    private $idLugar;

    /**
     * @var \Diahora
     *
     * @ORM\ManyToOne(targetEntity="Diahora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_diahora", referencedColumnName="id_diahora")
     * })
     */
    private $idDiahora;

    /**
     * @var \Horarioasignatura
     *
     * @ORM\ManyToOne(targetEntity="Horarioasignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_h_asig", referencedColumnName="id_h_asig")
     * })
     */
    private $idHAsig;


}
