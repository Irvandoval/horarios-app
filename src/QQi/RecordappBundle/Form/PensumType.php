<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PensumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nivel',null,array('label'=>'Nivel',))
            ->add('activa',null,array('label'=>'Activa',))
            ->add('plan','text',array('label'=>'Plan de estudio',))
            ->add('vigente',null,array('label'=>'Vigente',))
            ->add('idAsignatura','entity', array('label'=>'Asignatura',
              'class' => 'QQiRecordappBundle:Asignatura', 'empty_value' => 'opciones',
            ))
            ->add('idCarrera','entity', array('label'=>'Carrera',
              'class' => 'QQiRecordappBundle:Carrera', 'empty_value' => 'opciones',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Pensum'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_pensumtype';
    }
}
