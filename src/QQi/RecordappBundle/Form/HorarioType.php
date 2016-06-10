<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaCreacion','date',array('label'=>'Fecha de Creación',))
            ->add('idEstado','entity', array('label'=>'Estado',
              'class' => 'QQiRecordappBundle:Estados', 'empty_value' => 'opciones',
            ))
            ->add('idCiclo','entity', array('label'=>'Ciclo',
              'class' => 'QQiRecordappBundle:Ciclo', 'empty_value' => 'opciones',
            ))
            ->add('idEscuela','entity', array('label'=>'Escuela',
              'class' => 'QQiRecordappBundle:Escuelas', 'empty_value' => 'opciones',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Horario'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_horariotype';
    }
}
