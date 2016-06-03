<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EscuelasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('idFacultad')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Escuelas'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_escuelastype';
    }
}
