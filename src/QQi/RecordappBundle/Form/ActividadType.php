<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActividadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('idHoasig','entity',array('label'=>'Horarios de Asignaturas Aprobadas',
                       'class'=>'QQiRecordappBundle:Horarioasignatura', 'empty_value'=>'Seleccione un horario',
            ))
            ->add('idTipoactividad','entity', array('label'=>'Tipo de Grupo',
              'class' => 'QQiRecordappBundle:Tipoactividad', 'empty_value' => 'Seleccione el Tipo de Grupo',
            ))
            ->add('numero_grupo')
            ->add('idLugar','entity', array('label'=>'Local de la Actividad',
              'class' => 'QQiRecordappBundle:Lugar', 'empty_value' => 'Seleccione el Local',
            ))
            ->add('idDia','entity', array('label'=>'Día de Actividad',
              'class' => 'QQiRecordappBundle:Dia', 'empty_value' => 'Seleccione el Día',
            ))
            ->add('idFranja','entity', array('label'=>'Horario',
              'class' => 'QQiRecordappBundle:Franja', 'empty_value' => 'Seleccione el Horario',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Actividad'
        ));

    }

    public function getName()
    {
        return 'qqi_recordappbundle_actividadtype';
    }
}
