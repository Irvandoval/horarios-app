<?php

namespace Hora\HoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Public.horarioasignatura
 *
 * @ORM\Table(name="public.horarioasignatura")
 * @ORM\Entity
 */
class Public.horarioasignatura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_h_asig", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="public.horarioasignatura_id_h_asig_seq", allocationSize=1, initialValue=1)
     */
    private $idHAsig;

    /**
     * @var float
     *
     * @ORM\Column(name="correlativo", type="decimal", nullable=false)
     */
    private $correlativo;

    /**
     * @var \Asignatura
     *
     * @ORM\ManyToOne(targetEntity="Asignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id_asignatura")
     * })
     */
    private $idAsignatura;

    /**
     * @var \Horario
     *
     * @ORM\ManyToOne(targetEntity="Horario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_horario", referencedColumnName="id_horario")
     * })
     */
    private $idHorario;


}
