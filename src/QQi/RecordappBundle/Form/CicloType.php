<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CicloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('fechaInicio')
            ->add('fechaFin')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Ciclo'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_ciclotype';
    }
}
