<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorarioasignaturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('correlativo','integer',array('label'=>'Correlativo',))
            ->add('idHorario','entity', array('label'=>'Nombre',
              'class' => 'QQiRecordappBundle:Horario', 'empty_value' => 'Elija el Horario',
            ))
            ->add('idAsignatura','entity', array('label'=>'Nombre',
              'class' => 'QQiRecordappBundle:Asignatura', 'empty_value' => 'Asignatura',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Horarioasignatura'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_horarioasignaturatype';
    }
}
