<?php

namespace ContainerKtW0gjO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_SYtZuEService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.S_ytZuE' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.S_ytZuE'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\ArticleController::delete' => ['privates', '.service_locator.SKscQSb', 'get_ServiceLocator_SKscQSbService', true],
            'App\\Controller\\ArticleController::editArticle' => ['privates', '.service_locator.SKscQSb', 'get_ServiceLocator_SKscQSbService', true],
            'App\\Controller\\CategorieController::delete' => ['privates', '.service_locator.L023XFm', 'get_ServiceLocator_L023XFmService', true],
            'App\\Controller\\CategorieController::editCategorie' => ['privates', '.service_locator.L023XFm', 'get_ServiceLocator_L023XFmService', true],
            'App\\Controller\\SecurityController::login' => ['privates', '.service_locator.xA8Fw_.', 'get_ServiceLocator_XA8Fw_Service', true],
            'App\\Controller\\SecurityController::registration' => ['privates', '.service_locator.1d_X9dd', 'get_ServiceLocator_1dX9ddService', true],
            'App\\Controller\\VenteController::delete' => ['privates', '.service_locator.tZP1ua5', 'get_ServiceLocator_TZP1ua5Service', true],
            'App\\Controller\\VenteController::edit_vente' => ['privates', '.service_locator.CXTQ6xL', 'get_ServiceLocator_CXTQ6xLService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel::terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
            'App\\Controller\\ArticleController:delete' => ['privates', '.service_locator.SKscQSb', 'get_ServiceLocator_SKscQSbService', true],
            'App\\Controller\\ArticleController:editArticle' => ['privates', '.service_locator.SKscQSb', 'get_ServiceLocator_SKscQSbService', true],
            'App\\Controller\\CategorieController:delete' => ['privates', '.service_locator.L023XFm', 'get_ServiceLocator_L023XFmService', true],
            'App\\Controller\\CategorieController:editCategorie' => ['privates', '.service_locator.L023XFm', 'get_ServiceLocator_L023XFmService', true],
            'App\\Controller\\SecurityController:login' => ['privates', '.service_locator.xA8Fw_.', 'get_ServiceLocator_XA8Fw_Service', true],
            'App\\Controller\\SecurityController:registration' => ['privates', '.service_locator.1d_X9dd', 'get_ServiceLocator_1dX9ddService', true],
            'App\\Controller\\VenteController:delete' => ['privates', '.service_locator.tZP1ua5', 'get_ServiceLocator_TZP1ua5Service', true],
            'App\\Controller\\VenteController:edit_vente' => ['privates', '.service_locator.CXTQ6xL', 'get_ServiceLocator_CXTQ6xLService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel:terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
        ], [
            'App\\Controller\\ArticleController::delete' => '?',
            'App\\Controller\\ArticleController::editArticle' => '?',
            'App\\Controller\\CategorieController::delete' => '?',
            'App\\Controller\\CategorieController::editCategorie' => '?',
            'App\\Controller\\SecurityController::login' => '?',
            'App\\Controller\\SecurityController::registration' => '?',
            'App\\Controller\\VenteController::delete' => '?',
            'App\\Controller\\VenteController::edit_vente' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\ArticleController:delete' => '?',
            'App\\Controller\\ArticleController:editArticle' => '?',
            'App\\Controller\\CategorieController:delete' => '?',
            'App\\Controller\\CategorieController:editCategorie' => '?',
            'App\\Controller\\SecurityController:login' => '?',
            'App\\Controller\\SecurityController:registration' => '?',
            'App\\Controller\\VenteController:delete' => '?',
            'App\\Controller\\VenteController:edit_vente' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}
