<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Get_Login_Data::dashboard');
$routes->post('auth','Post_User::compare');


// $routes->get('public', 'Post_User::public_user');

$routes->get('public', 'Post_User::data_pejabat');



?>