<?php

namespace ContainerGx0x3jN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChercheTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\ChercheType' shared autowired service.
     *
     * @return \App\Form\ChercheType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\form\\FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\form\\AbstractType.php';
        include_once \dirname(__DIR__, 4).'\\src\\Form\\ChercheType.php';

        return $container->privates['App\\Form\\ChercheType'] = new \App\Form\ChercheType();
    }
}
