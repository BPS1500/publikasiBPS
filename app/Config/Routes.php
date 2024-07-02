<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->group('auth', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->post('login', 'AuthController::login');
});