<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarreraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array('label'=>'Nombre',))
            ->add('idFacultad','entity', array('label'=>'Facultad',
              'class' => 'QQiRecordappBundle:Facultad', 'empty_value' => 'Elija la Facultad',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Carrera'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_carreratype';
    }
}
