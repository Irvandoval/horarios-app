<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsignaturaEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('codigo')
            ->add('idEscuela','entity', array(
              'class' => 'QQiRecordappBundle:Escuelas', 'empty_value' => 'opciones',
            ))
            ->add('usuario')

        ;
    }

    public function getName()
    {
        return 'qqi_recordappbundle_asignaturaedittype';
    }
}
