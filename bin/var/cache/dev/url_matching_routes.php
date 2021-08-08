<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/ajout_article' => [[['_route' => 'ajout_article', '_controller' => 'App\\Controller\\ArticleController::ajoutArticle'], null, null, null, false, false, null]],
        '/liste_article' => [[['_route' => 'liste_article', '_controller' => 'App\\Controller\\ArticleController::listeArticle'], null, null, null, false, false, null]],
        '/cherche_article' => [[['_route' => 'cherche_article', '_controller' => 'App\\Controller\\ArticleController::chercheArticle'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\CategorieController::index'], null, null, null, false, false, null]],
        '/ajout_categorie' => [[['_route' => 'ajout_categorie', '_controller' => 'App\\Controller\\CategorieController::ajoutCategorie'], null, null, null, false, false, null]],
        '/liste_cat' => [[['_route' => 'liste_cat', '_controller' => 'App\\Controller\\CategorieController::listeCategorie'], null, null, null, false, false, null]],
        '/inscription' => [[['_route' => 'security_registration', '_controller' => 'App\\Controller\\SecurityController::registration'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/ajout_vente' => [[['_route' => 'ajout_vente', '_controller' => 'App\\Controller\\VenteController::ajoutVente'], null, null, null, false, false, null]],
        '/liste_vente' => [[['_route' => 'liste_vente', '_controller' => 'App\\Controller\\VenteController::liste'], null, null, null, false, false, null]],
        '/cherche' => [[['_route' => 'cherche', '_controller' => 'App\\Controller\\VenteController::cherche'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/edit_(?'
                    .'|article/([^/]++)(*:194)'
                    .'|cat/([^/]++)(*:214)'
                    .'|vente/([^/]++)(*:236)'
                .')'
                .'|/delete_(?'
                    .'|article/([^/]++)(*:272)'
                    .'|cat/([^/]++)(*:292)'
                    .'|vente/([^/]++)(*:314)'
                .')'
                .'|/show_vente/([^/]++)(*:343)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        194 => [[['_route' => 'edit_article', '_controller' => 'App\\Controller\\ArticleController::editArticle'], ['id'], null, null, false, true, null]],
        214 => [[['_route' => 'edit_cat', '_controller' => 'App\\Controller\\CategorieController::editCategorie'], ['id'], null, null, false, true, null]],
        236 => [[['_route' => 'edit_vente', '_controller' => 'App\\Controller\\VenteController::edit_vente'], ['id'], null, null, false, true, null]],
        272 => [[['_route' => 'delete_article', '_controller' => 'App\\Controller\\ArticleController::delete'], ['id'], null, null, false, true, null]],
        292 => [[['_route' => 'delete_cat', '_controller' => 'App\\Controller\\CategorieController::delete'], ['id'], null, null, false, true, null]],
        314 => [[['_route' => 'delete_vente', '_controller' => 'App\\Controller\\VenteController::delete'], ['id'], null, null, false, true, null]],
        343 => [
            [['_route' => 'show_vente', '_controller' => 'App\\Controller\\VenteController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];