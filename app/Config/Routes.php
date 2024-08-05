<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->match(['get', 'post'], 'login', 'AuthController::doLogin');
$routes->match(['get', 'post'], 'logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'DashboardController::index');

    //users
    $routes->get('users', 'UserController::index');
    $routes->get('users/create', 'UserController::create');
    $routes->post('users/store', 'UserController::store');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/update/(:num)', 'UserController::update/$1');
    $routes->post('users/delete/(:num)', 'UserController::delete/$1');


    //type console
    $routes->get('/console-type', 'ConsoleTypeController::index');
    $routes->get('/console-type/create', 'ConsoleTypeController::create');
    $routes->post('/console-type/store', 'ConsoleTypeController::store');
    $routes->get('/console-type/edit/(:num)', 'ConsoleTypeController::edit/$1');
    $routes->post('console-type/update/(:num)', 'ConsoleTypeController::update/$1');
    $routes->post('console-type/delete/(:num)', 'ConsoleTypeController::delete/$1');

    //console
    $routes->get('/console', 'ConsoleController::index');
    $routes->get('console/create', 'ConsoleController::create');
    $routes->post('console/store', 'ConsoleController::store');
    $routes->get('console/edit/(:num)', 'ConsoleController::edit/$1');
    $routes->post('console/update/(:num)', 'ConsoleController::update/$1');
    $routes->post('console/delete/(:num)', 'ConsoleController::delete/$1');

    //rental
    $routes->get('/rentals', 'RentalController::index');
    $routes->get('/rentals/create', 'RentalController::create');
    $routes->post('/rentals/store', 'RentalController::store');
    // $routes->get('/rentals/edit/(:num)', 'RentalController::edit/$1');
    // $routes->post('/rentals/update/(:num)', 'RentalController::update/$1');
    $routes->post('/rentals/delete/(:num)', 'RentalController::delete/$1');

    //transaction
    $routes->get('/transaksi/dipinjam', 'RentalController::dipinjam');
    $routes->get('/transaksi/selesai', 'RentalController::selesai');
    $routes->get('/transaksi/dibatalkan', 'RentalController::dibatalkan');

    $routes->get('/rental/update-status/(:num)/(:segment)', 'RentalController::updateStatus/$1/$2');

});
