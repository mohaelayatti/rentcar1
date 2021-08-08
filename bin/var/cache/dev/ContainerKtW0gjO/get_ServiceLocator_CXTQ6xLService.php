<?php

namespace ContainerKtW0gjO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_CXTQ6xLService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.CXTQ6xL' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.CXTQ6xL'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'vente' => ['privates', '.errored..service_locator.CXTQ6xL.App\\Entity\\Vente', NULL, 'Cannot autowire service ".service_locator.CXTQ6xL": it references class "App\\Entity\\Vente" but no such service exists.'],
        ], [
            'em' => '?',
            'vente' => 'App\\Entity\\Vente',
        ]);
    }
}