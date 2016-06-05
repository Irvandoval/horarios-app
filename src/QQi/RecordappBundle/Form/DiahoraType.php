<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DiahoraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('dia','choice', array(
                     'choices'   => array(
                      'Lunes'   => 'Lunes',
                      'Martes' => 'Martes',
                      'Miercoles'   => 'Miercoles',
                      'Jueves'   => 'Jueves',
                      'Viernes'   => 'Viernes',
                      'Sabado'   => 'Sabado',
                  )))
            ->add('hora')
            ->add('idCiclo','entity', array(
              'class' => 'QQiRecordappBundle:Ciclo', 'empty_value' => 'opciones',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Diahora'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_diahoratype';
    }
}
