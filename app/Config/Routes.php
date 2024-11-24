<?php

namespace Config;

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::doRegister');
$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/my-informations-general', 'user\InfoGeneralController::index');
$routes->post('/my-informations-general/store', 'user\InfoGeneralController::store');

$routes->get('/my-informations-flr', 'user\InfoFLRController::index');
$routes->post('/my-informations-flr/store', 'user\InfoFLRController::store');

$routes->get('/my-informations-contact', 'user\InfoContactController::index');
$routes->post('/my-informations-contact/store', 'user\InfoContactController::store');

$routes->get('/my-informations-commentaires', 'user\InfoCommentaireController::index');
$routes->post('/my-informations-commentaires/store', 'user\InfoCommentaireController::store');

$routes->get('my-informations-clients', 'User\InfoClientsController::index');
$routes->post('my-informations-clients/store', 'User\InfoClientsController::store');

$routes->post('my-informations-contact/delete/(:num)', 'user\InfoContactController::delete/$1');

// Admin routes
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('suppliers', 'SuppliersController::index'); 
    $routes->post('addsuppliers', 'SuppliersController::create');
    $routes->get('supplier/view/(:num)', 'InfoSupplierController::view/$1');
});

// User routes
$routes->group('dashboard', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('/', 'user\UserController::index');
});
