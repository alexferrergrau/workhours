<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text',
                array('label' => 'Tarea',
                    'label_attr' => array(
                        'class' => 'col-lg-2 control-label'
                    ),
                    'attr' =>
                        array(
                            'placeholder' => 'Pon un nombre a tu tarea',
                            'class' => 'form-control'),
                )
            )
            ->add('description', 'textarea',
                array('label' => 'Descripción',
                    'label_attr' => array(
                        'class' => 'col-lg-2 control-label'
                    ),
                    'attr' =>
                        array(
                            'placeholder' => 'Describe la tarea que has realizado',
                            'class' => 'form-control', 'rows' => '5'),
                )
            )
            ->add('hours', 'number', array('label' => 'Horas empleadas', 'label_attr' => array(
                'class' => 'col-lg-2 control-label'
            ), 'attr' =>
                array(
                    'placeholder' => 'Horas',
                    'class' => 'form-control')));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_task';
    }
}
