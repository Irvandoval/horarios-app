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
            ->add('correlativo')
            ->add('idHorario','entity', array(
              'class' => 'QQiRecordappBundle:Horario', 'empty_value' => 'opciones',
            ))
            ->add('idAsignatura','entity', array(
              'class' => 'QQiRecordappBundle:Asignatura', 'empty_value' => 'opciones',
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
