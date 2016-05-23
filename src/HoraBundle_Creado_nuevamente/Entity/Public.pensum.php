<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.pensum
 *
 * @ORM\Table(name="public.pensum")
 * @ORM\Entity
 */
class Public.pensum
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pensum", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.pensum_id_pensum_seq", allocationSize=1, initialValue=1)
     */
    private $idPensum;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean", nullable=true)
     */
    private $activa;

    /**
     * @var string
     *
     * @ORM\Column(name="plan", type="string", length=25, nullable=true)
     */
    private $plan;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vigente", type="boolean", nullable=true)
     */
    private $vigente;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_carrera", referencedColumnName="id_carrera")
     * })
     */
    private $idCarrera;

    /**
     * @var \Asignatura
     *
     * @ORM\ManyToOne(targetEntity="Asignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id_asignatura")
     * })
     */
    private $idAsignatura;


}
