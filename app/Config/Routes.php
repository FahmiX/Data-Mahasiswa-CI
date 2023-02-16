<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', fn () => 'Hello World!');
//$routes->get('/', 'Home::home');

// Mahasiswa
// $routes->get('/mahasiswa', 'c_mahasiswa::display');
// $routes->get('/mahasiswa/create', 'c_mahasiswa::create');
// $routes->post('/mahasiswa/store', 'c_mahasiswa::store');

// Home
// Group give filter authGuard
$routes->group('', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'c_home::home');
    $routes->get('/home', 'c_home::home');
    $routes->get('/info', 'c_info::info');

    // mahasiswa
    $routes->get('/mahasiswa', 'c_mahasiswa::mahasiswa_tampil');
    $routes->get('/mahasiswa/delete/(:num)', 'c_mahasiswa::mahasiswa_delete/$1');
    $routes->get('/mahasiswa/detail/(:num)', 'c_mahasiswa::mahasiswa_detail/$1');
    $routes->get('/mahasiswa/create', 'c_mahasiswa::mahasiswa_create');
    $routes->post('/mahasiswa/store', 'c_mahasiswa::mahasiswa_store');
    $routes->get('/mahasiswa/edit/(:num)', 'c_mahasiswa::mahasiswa_edit/$1');
    $routes->post('/mahasiswa/update', 'c_mahasiswa::mahasiswa_update');
    $routes->post('/mahasiswa/search', 'c_mahasiswa::mahasiswa_search');

    // pegawai
    $routes->get('/pegawai', 'c_pegawai::display');
    $routes->get('/pegawai/create', 'c_pegawai::create');
    $routes->post('/pegawai/store', 'c_pegawai::store');   
});

// Login & Logout
$routes->get('/login', 'c_login::display');
$routes->post('/login', 'c_login::login');
$routes->get('/logout', 'c_login::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
