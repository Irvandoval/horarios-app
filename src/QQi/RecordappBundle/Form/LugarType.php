<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LugarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('cupo')
            ->add('idFacultad','entity', array(
              'class' => 'QQiRecordappBundle:Facultad', 'empty_value' => 'opciones',
            ))
            ->add('idTipolugar','entity', array(
              'class' => 'QQiRecordappBundle:Tipolugar', 'empty_value' => 'opciones',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Lugar'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_lugartype';
    }
}
