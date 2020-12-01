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
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Categories
$routes->get('/admin/categories', 'Admin\Categories::index');
$routes->delete('/admin/categories/(:num)', 'Admin\Categories::delete/$1');
$routes->get('/admin/categories/(:num)', 'Admin\Categories::edit/$1');
$routes->post('/admin/categories/add', 'Admin\Categories::add');
$routes->get('/admin/categories/show', 'Admin\Categories::show');
$routes->post('/admin/categories/update/(:num)', 'Admin\Categories::update/$1');
$routes->get('/admin/categories/active', 'Admin\Categories::categoryActive');

// Products
$routes->get('/admin/products', 'Admin\Products::index');
$routes->get('/admin/products/show', 'Admin\Products::show');
$routes->post('/admin/products/add', 'Admin\Products::add');
$routes->get('/admin/products/(:num)', 'Admin\Products::edit/$1');

/**
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
