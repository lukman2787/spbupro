<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//default admin controller
$routes->get('administrator', 'Auth::login');
// $routes->addRedirect('/', 'Admin/Dashboard::index');

//controller admin dashboard
$routes->get('/admin/dashboard', 'Admin\DashboardController::index');

$routes->get('/admin/posts', 'Admin\PostController::index');


// controller gawe
$routes->get('admin/gawe', 'Admin/Gawe::index');
$routes->get('admin/gawe/add', 'Admin/Gawe::create');
$routes->post('admin/gawe', 'Admin/Gawe::store');
$routes->get('admin/gawe/edit/(:any)', 'Admin/Gawe::edit/$1');
$routes->put('admin/gawe/(:any)', 'Admin/Gawe::update/$1');
$routes->delete('admin/gawe/(:segment)', 'Admin/Gawe::destroy/$1');

//controller group kontak
$routes->presenter('groups');

//controller users
$routes->get('admin/users', 'Admin/Users::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
