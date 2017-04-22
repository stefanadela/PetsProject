<?php
//use Symfony\Component\DependencyInjection\ContainerBuilder;
//use Symfony\Component\HttpKernel\DependencyInjection\Extension;
//use Symfony\Component\Config\FileLocator;
//use Symfony\Component\DependencyInjection\Loader;
//
///**
// * Created by PhpStorm.
// * User: Adela_PC
// * Date: 30.01.2017
// * Time: 19:15
// */
//class DogCoreExtension extends Extension
//{
//
//    /**
//     * {@inheritdoc}
//     */
//    public function load(array $configs, ContainerBuilder $container)
//    {
//        $configuration = new Configuration();
//        $this->processConfiguration($configuration, $configs);
//
//        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services/'));
//        $loader->load('forms.yml');
//
//    }
//}