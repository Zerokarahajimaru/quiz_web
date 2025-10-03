<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login\Get_Login_Data::dashboard');
$routes->post('auth','Login\Post_User::compare');

$routes->get('public', 'Login\Post_User::public_user');

// $routes->get('public', 'Post_User::data_pejabat');

?>