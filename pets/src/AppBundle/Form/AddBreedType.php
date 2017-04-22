<?php
///**
// * Created by PhpStorm.
// * User: Adela_PC
// * Date: 17.02.2017
// * Time: 20:40
// */
//
//namespace AppBundle\Form;
//
//
//use AppBundle\Entity\Breed;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolver;
//
//class AddBreedType extends AbstractType
//{
//
//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => Breed::class,
//        ));
//    }
//
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add(
//                'name',
//                'text',
//                array(
//                    'attr' => array(
//                        'label' => 'Breed Name'
//                    )
//                )
//            )
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
//            )
//        ->add(
//            'Add',
//            'submit'
//        );
//    }
//
//    /**
//     * Returns the name of this type.
//     *
//     * @return string The name of this type
//     */
//    public function getName()
//    {
//        return 'add_breed_type';
//    }
//}