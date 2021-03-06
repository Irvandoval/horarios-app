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
            ->add('nombre','text',array('label'=>'Nombre',))
            ->add('codigo','text',array('label'=>'Código',))
            ->add('idEscuela','entity', array('label'=>'Escuelas',
              'class' => 'QQiRecordappBundle:Escuelas', 'empty_value' => 'Elija una Escuela',
            ))
            ->add('usuario','entity', array('label'=>'Usuario',
              'class' => 'QQiRecordappBundle:Usuario', 'empty_value' => 'Elija un Uusario',
            ))
            ->add('demanda','integer',array('label'=>'Demanda',))

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
        return 'asignaturaedittype';
    }
}
