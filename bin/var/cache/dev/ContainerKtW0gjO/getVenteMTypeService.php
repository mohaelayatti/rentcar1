<?php

namespace ContainerKtW0gjO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVenteMTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\VenteMType' shared autowired service.
     *
     * @return \App\Form\VenteMType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\form\\FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\form\\AbstractType.php';
        include_once \dirname(__DIR__, 4).'\\src\\Form\\VenteMType.php';

        return $container->privates['App\\Form\\VenteMType'] = new \App\Form\VenteMType();
    }
}
