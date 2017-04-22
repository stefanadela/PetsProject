<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BreedType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                'text',
                array(
                    'attr' => array(
                        'label' => 'Breed Name',
                        'class' => 'form-control'
                    )
                )
            );
//            ->add(
//                'color',
//                'entity',
//                array(
//                    'class' => 'AppBundle:Color',
//                    'property' => 'name',
//                )
//            )
//            ->add(
//                'size',
//                'entity',
//                array(
//                    'class' => 'AppBundle:Size',
//                    'property' => 'name'
//                )
//            );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Breed'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_breed';
    }
}
