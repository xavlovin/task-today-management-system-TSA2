<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public pages (no login needed)
$routes->get('/',        'TaskController::today');
$routes->get('/tasks',   'TaskController::index');
$routes->get('/profile', 'UserController::index');
$routes->get('/about',   'PagesController::about');

// Login / logout
$routes->get('/login',  'AuthController::loginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// Protected task routes (the "auth" filter redirects to /login if not logged in)
$routes->get('/tasks/new',              'TaskController::new',      ['filter' => 'auth']);
$routes->post('/tasks',                 'TaskController::create',   ['filter' => 'auth']);
$routes->get('/tasks/(:num)/edit',      'TaskController::edit/$1',   ['filter' => 'auth']);
$routes->post('/tasks/(:num)/update',   'TaskController::update/$1', ['filter' => 'auth']);
$routes->post('/tasks/(:num)/delete',   'TaskController::delete/$1', ['filter' => 'auth']);
