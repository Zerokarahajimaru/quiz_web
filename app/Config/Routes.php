<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login\Get_Login_Data::dashboard');
$routes->post('auth','Login\Post_User::compare');



$routes->group('public', ['filter' => ['authgokil','filter_user']], function($routes) {
    $routes->get('/', 'Login\Post_User::public_user');
}
);




$routes->group('admin',['filter' => ['authgokil','filter_admin']], function ($routes)  {
  

$routes->get('/', 'Admin\Admin_Anggota_Controller::admin_view_f');
$routes->post('anggota/delete/(:num)', 'Admin\Admin_Anggota_Controller::del_pejabat/$1');


$routes->post('anggota/update', 'Admin\Admin_Anggota_Controller::update_pejabat');


$routes->post('anggota/insert', 'Admin\Admin_Anggota_Controller::insert_pejabat');

$routes->post('komponen_gaji/update', 'Admin\Admin_Anggota_Controller::update_komponen_gaji');

$routes->post('komponen_gaji/delete/(:num)', 'Admin\Admin_Anggota_Controller::delete_komponen_gaji/$1');

$routes->post('komponen_gaji/insert', 'Admin\Admin_Anggota_Controller::insert_komponen_gaji');


});

?>
