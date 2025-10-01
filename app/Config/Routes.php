<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Get_ujian::home_page');


$routes->group('users', function($routes) {
    $routes->get('/', 'UserController::index');     // GET semua user
    $routes->get('(:num)', 'UserController::show/$1'); // GET user by id
    $routes->post('/', 'UserController::create');   // POST tambah user
    $routes->put('(:num)', 'UserController::update/$1'); // PUT update user
    $routes->delete('(:num)', 'UserController::delete/$1'); // DELETE user
});


$routes->get('user-list', 'UserController::list');


$routes->post('/','::');

?>