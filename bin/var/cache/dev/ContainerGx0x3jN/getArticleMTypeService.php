<?php

namespace ContainerGx0x3jN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getArticleMTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\ArticleMType' shared autowired service.
     *
     * @return \App\Form\ArticleMType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\form\\FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\form\\AbstractType.php';
        include_once \dirname(__DIR__, 4).'\\src\\Form\\ArticleMType.php';

        return $container->privates['App\\Form\\ArticleMType'] = new \App\Form\ArticleMType();
    }
}
