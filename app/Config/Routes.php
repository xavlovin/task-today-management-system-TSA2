<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/',        'TaskController::today');
$routes->get('/tasks',   'TaskController::index');
$routes->get('/profile', 'UserController::index');
$routes->get('/about',   'PagesController::about');
