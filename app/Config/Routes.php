<?php

namespace Config;

// Routes d'authentification
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::doRegister');
$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

// Routes des informations utilisateur
$routes->get('/my-informations-general', 'user\InfoGeneralController::index');
$routes->post('/my-informations-general/store', 'user\InfoGeneralController::store');

$routes->get('/my-informations-flr', 'user\InfoFLRController::index');
$routes->post('/my-informations-flr/store', 'user\InfoFLRController::store');

$routes->get('/my-informations-contact', 'user\InfoContactController::index');
$routes->post('/my-informations-contact/store', 'user\InfoContactController::store');
$routes->post('my-informations-contact/delete/(:num)', 'user\InfoContactController::delete/$1');

$routes->get('/my-informations-commentaires', 'user\InfoCommentaireController::index');
$routes->post('/my-informations-commentaires/store', 'user\InfoCommentaireController::store');

$routes->get('my-informations-clients', 'User\InfoClientsController::index');
$routes->post('my-informations-clients/store', 'User\InfoClientsController::store');

$routes->get('/documents', 'User\DocumentsController::index');
$routes->post('/documents/upload', 'User\DocumentsController::upload');

// Routes administratives
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('suppliers', 'SuppliersController::index'); 
    $routes->post('addsuppliers', 'SuppliersController::create');
    $routes->get('supplier/view/(:num)', 'InfoSupplierController::view/$1');
    $routes->post('supplier/reject/(:num)', 'InfoSupplierController::reject/$1');
    $routes->post('supplier/accept/(:num)', 'InfoSupplierController::accept/$1');
    

});

// Routes utilisateur
$routes->group('dashboard', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('/', 'user\UserController::index');
});
