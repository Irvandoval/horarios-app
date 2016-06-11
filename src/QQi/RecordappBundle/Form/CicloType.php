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
            ->add('nombre','text',array('label'=>'Nombre',))
             ->add('fechaInicio', 'date', array('label'=>'Fecha Inicio',
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('fechaFin', 'date', array('label'=>'Fecha Fin',
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
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
