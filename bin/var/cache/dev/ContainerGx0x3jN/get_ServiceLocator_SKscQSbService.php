<?php

namespace ContainerGx0x3jN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_SKscQSbService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.SKscQSb' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.SKscQSb'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'article' => ['privates', '.errored..service_locator.SKscQSb.App\\Entity\\ArticleStock', NULL, 'Cannot autowire service ".service_locator.SKscQSb": it references class "App\\Entity\\ArticleStock" but no such service exists.'],
        ], [
            'article' => 'App\\Entity\\ArticleStock',
        ]);
    }
}
