<?php

namespace QQi\RecordappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActividadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idHoasig','entity', array(
              'class' => 'QQiRecordappBundle:Horarioasignatura', 'empty_value' => 'opciones',
            ))
            ->add('idTipoactividad','entity', array(
              'class' => 'QQiRecordappBundle:Tipoactividad', 'empty_value' => 'opciones',
            ))
            ->add('idLugar','entity', array(
              'class' => 'QQiRecordappBundle:Lugar', 'empty_value' => 'opciones',
            ))
            ->add('idDiahora','entity', array(
              'class' => 'QQiRecordappBundle:Diahora', 'empty_value' => 'opciones',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QQi\RecordappBundle\Entity\Actividad'
        ));
    }

    public function getName()
    {
        return 'qqi_recordappbundle_actividadtype';
    }
}