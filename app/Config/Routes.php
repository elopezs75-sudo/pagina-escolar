<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Home::index');
$routes->get('migrate', 'Migrations::index');

// Tareas: ver (todos los usuarios con sesión)
$routes->get('tareas', 'Tareas::index');
$routes->get('tareas/show/(:num)', 'Tareas::show/$1');

// Tareas: crear, editar y eliminar (solo administrador)
$routes->group('tareas', ['filter' => 'admin'], function ($routes) {
    $routes->get('new', 'Tareas::new');
    $routes->post('create', 'Tareas::create');
    $routes->get('edit/(:num)', 'Tareas::edit/$1');
    $routes->post('update/(:num)', 'Tareas::update/$1');
    $routes->post('delete/(:num)', 'Tareas::delete/$1');
});

// Registro y sesión
$routes->get('registro', 'Usuarios::registro');
$routes->post('registro', 'Usuarios::guardar');

$routes->get('login', 'Sesion::login');
$routes->post('login', 'Sesion::entrar');
$routes->get('logout', 'Sesion::salir');

// Perfil
$routes->get('perfil', 'Perfil::index');
$routes->get('perfil/editar', 'Perfil::editar');
$routes->post('perfil/actualizar', 'Perfil::actualizar');
$routes->get('perfil/password', 'Perfil::password');
$routes->post('perfil/password', 'Perfil::cambiarPassword');

// Usuarios (solo administrador)
$routes->group('usuarios', ['filter' => 'admin'], function ($routes) {
    $routes->get('', 'UsuariosAdmin::index');
    $routes->get('nuevo', 'UsuariosAdmin::nuevo');
    $routes->post('nuevo', 'UsuariosAdmin::crear');
    $routes->get('(:num)', 'UsuariosAdmin::ver/$1');
    $routes->get('(:num)/editar', 'UsuariosAdmin::editar/$1');
    $routes->post('(:num)/editar', 'UsuariosAdmin::actualizar/$1');
    $routes->post('(:num)/eliminar', 'UsuariosAdmin::eliminar/$1');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}