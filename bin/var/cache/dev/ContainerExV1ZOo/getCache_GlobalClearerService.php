<?php

namespace ContainerExV1ZOo;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_GlobalClearerService extends App_KernelDevContainer
{
    /*
     * Gets the public 'cache.global_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache.global_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(['cache.app' => ($container->services['cache.app'] ?? $container->load('getCache_AppService')), 'cache.system' => ($container->services['cache.system'] ?? $container->load('getCache_SystemService')), 'cache.validator' => ($container->privates['cache.validator'] ?? $container->getCache_ValidatorService()), 'cache.serializer' => ($container->privates['cache.serializer'] ?? $container->load('getCache_SerializerService')), 'cache.annotations' => ($container->privates['cache.annotations'] ?? $container->load('getCache_AnnotationsService')), 'cache.property_info' => ($container->privates['cache.property_info'] ?? $container->getCache_PropertyInfoService()), 'cache.property_access' => ($container->privates['cache.property_access'] ?? $container->load('getCache_PropertyAccessService')), 'cache.doctrine.orm.default.metadata' => ($container->privates['cache.doctrine.orm.default.metadata'] ?? ($container->privates['cache.doctrine.orm.default.metadata'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())), 'cache.doctrine.orm.default.result' => ($container->privates['cache.doctrine.orm.default.result'] ?? ($container->privates['cache.doctrine.orm.default.result'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())), 'cache.doctrine.orm.default.query' => ($container->privates['cache.doctrine.orm.default.query'] ?? ($container->privates['cache.doctrine.orm.default.query'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())), 'cache.security_expression_language' => ($container->privates['cache.security_expression_language'] ?? $container->load('getCache_SecurityExpressionLanguageService'))]);
    }
}
