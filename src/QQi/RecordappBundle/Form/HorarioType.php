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
            ->add('fechaCreacion')
            ->add('idEstado','entity', array(
              'class' => 'QQiRecordappBundle:Estados', 'empty_value' => 'opciones',
            ))
            ->add('idCiclo','entity', array(
              'class' => 'QQiRecordappBundle:Ciclo', 'empty_value' => 'opciones',
            ))
            ->add('idEscuela','entity', array(
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
