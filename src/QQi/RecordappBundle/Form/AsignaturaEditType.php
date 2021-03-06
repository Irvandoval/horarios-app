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
            ->add('nombre','text',array('label'=>'Nombre',))
            ->add('codigo','text',array('label'=>'Código',))
            ->add('idEscuela','entity', array('label'=>'Escuela',
              'class' => 'QQiRecordappBundle:Escuelas', 'empty_value' => 'Elija la Escuela',
            ))
            ->add('usuario','entity', array('label'=>'Usuario',
              'class' => 'QQiRecordappBundle:Usuario', 'empty_value' => 'Elija un Uusario',
            ))

        ;
    }

    public function getName()
    {
        return 'asignaturaedittype';
    }
}
