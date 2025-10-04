<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login\Get_Login_Data::dashboard');
$routes->post('auth','Login\Post_User::compare');

$routes->get('public', 'Login\Post_User::public_user');

$routes->get('admin', 'Admin\Admin_Anggota_Controller::admin_view_f');
$routes->post('admin/anggota/delete/(:num)', 'Admin\Admin_Anggota_Controller::del_pejabat/$1');


$routes->post('admin/anggota/update', 'Admin\Admin_Anggota_Controller::update_pejabat');


$routes->post('admin/anggota/insert', 'Admin\Admin_Anggota_Controller::insert_pejabat');

$routes->post('admin/komponen_gaji/update', 'Admin\Admin_Anggota_Controller::update_komponen_gaji');

$routes->post('admin/komponen_gaji/delete/(:num)', 'Admin\Admin_Anggota_Controller::delete_komponen_gaji/$1');



?>