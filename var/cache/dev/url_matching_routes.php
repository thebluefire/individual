<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/Book' => [[['_route' => 'Book_index', '_controller' => 'App\\Controller\\BookController::index'], null, ['GET' => 0], null, true, false, null]],
        '/Book/new' => [[['_route' => 'Book_new', '_controller' => 'App\\Controller\\BookController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/Genre' => [[['_route' => 'Genre_index', '_controller' => 'App\\Controller\\GenreController::index'], null, ['GET' => 0], null, true, false, null]],
        '/Genre/new' => [[['_route' => 'Genre_new', '_controller' => 'App\\Controller\\GenreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/Book/(?'
                    .'|([^/]++)(?'
                        .'|(*:62)'
                        .'|/edit(*:74)'
                        .'|(*:81)'
                    .')'
                    .'|find/([^/]++)(*:102)'
                .')'
                .'|/Genre/(?'
                    .'|find/([^/]++)(*:134)'
                    .'|([^/]++)(?'
                        .'|(*:153)'
                        .'|/edit(*:166)'
                        .'|(*:174)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        62 => [[['_route' => 'Book_show', '_controller' => 'App\\Controller\\BookController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        74 => [[['_route' => 'Book_edit', '_controller' => 'App\\Controller\\BookController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        81 => [[['_route' => 'Book_delete', '_controller' => 'App\\Controller\\BookController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        102 => [[['_route' => 'find_Book_by_name', '_controller' => 'App\\Controller\\BookController::findAllByName'], ['name'], null, null, false, true, null]],
        134 => [[['_route' => 'find_Genre_by_name', '_controller' => 'App\\Controller\\GenreController::findAllByName'], ['name'], null, null, false, true, null]],
        153 => [[['_route' => 'Genre_show', '_controller' => 'App\\Controller\\GenreController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        166 => [[['_route' => 'Genre_edit', '_controller' => 'App\\Controller\\GenreController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        174 => [
            [['_route' => 'Genre_delete', '_controller' => 'App\\Controller\\GenreController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
