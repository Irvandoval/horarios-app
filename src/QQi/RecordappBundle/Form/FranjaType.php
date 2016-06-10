<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FranjaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array('label'=>'Nombre',))
            ->add('hora_inicio','time',array('label'=>'Hora de Inicio',))
            ->add('hora_fin','time',array('label'=>'Hora Fin',))
            ->add('idCiclo','entity', array('label'=>'Ciclo',
              'class' => 'QQiRecordappBundle:Ciclo', 'empty_value' => 'Elija el Ciclo',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Franja'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_franjatype';
    }
}
