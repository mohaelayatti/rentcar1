<?php

namespace ContainerGx0x3jN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_TZP1ua5Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.tZP1ua5' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.tZP1ua5'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'v' => ['privates', '.errored..service_locator.tZP1ua5.App\\Entity\\Vente', NULL, 'Cannot autowire service ".service_locator.tZP1ua5": it references class "App\\Entity\\Vente" but no such service exists.'],
        ], [
            'v' => 'App\\Entity\\Vente',
        ]);
    }
}
