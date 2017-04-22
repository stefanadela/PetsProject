<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            ->add('username')
//            ->add('firstName')
//            ->add('lastName')
//            ->add('password', 'password')
//            ->add('email')
//            ->add('breed')
//        ;
        $builder
            ->add('firstName', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control input-sm floatlabel'
                    )
                )
            )
            ->add('lastName', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control input-sm floatlabel'
                    )
                )
            )
            ->add('email', 'email',
                array(
                    'attr' => array(
                        'class' => 'form-control input-sm floatlabel',
                        'placeholder' => 'Email'
                    )
                )
            )
            ->add('username', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control input-sm floatlabel',
                    )
                )
            )
            ->add('password', 'repeated', array(
                'type' => 'password',
                'first_options' => array(
                    'label' => 'Password',
                    'attr' => array(
                        'class' => 'form-control input-sm floatlabel'
                    )),
                'second_options' => array(
                    'label' => 'Repeat Password',
                    'attr' => array(
                        'class' => 'form-control input-sm floatlabel'
                    )),

            ))
            ->add('register', 'submit', array('attr' => array(
                'class' => 'btn btn-info btn-block'
            )));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user_register';
    }
}
