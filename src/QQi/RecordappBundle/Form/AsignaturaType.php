<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsignaturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('codigo')
            ->add('idEscuela','entity', array('label'=>'Escuelas',
              'class' => 'QQiRecordappBundle:Escuelas', 'empty_value' => 'Elija una Escuela',
            ))
            ->add('usuario')

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Asignatura'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_asignaturatype';
    }
}
