<?php

namespace Config;

// Routes d'authentification
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::doRegister');
$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

// Routes utilisateur
$routes->group('user', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('/', 'user\UserController::index');
    
    // Informations générales
    $routes->get('my-informations-general', 'user\InfoGeneralController::index');
    $routes->post('my-informations-general/store', 'user\InfoGeneralController::store');
    
    // Informations FLR
    $routes->get('my-informations-flr', 'user\InfoFLRController::index');
    $routes->post('my-informations-flr/store', 'user\InfoFLRController::store');
    
    // Informations contact
    $routes->get('my-informations-contact', 'user\InfoContactController::index');
    $routes->post('my-informations-contact/store', 'user\InfoContactController::store');
    $routes->post('my-informations-contact/delete/(:num)', 'user\InfoContactController::delete/$1');
    
    // Informations commentaires
    $routes->get('my-informations-commentaires', 'user\InfoCommentaireController::index');
    $routes->post('my-informations-commentaires/store', 'user\InfoCommentaireController::store');
    
    // Informations clients
    $routes->get('my-informations-clients', 'user\InfoClientsController::index');
    $routes->post('my-informations-clients/store', 'user\InfoClientsController::store');
    
    // Documents et contrats
    $routes->get('documents', 'user\DocumentsController::index');
    $routes->post('documents/upload', 'user\DocumentsController::upload');
    $routes->get('contracts', 'user\ContractsController::index');
    $routes->get('contracts/download/(:num)', 'user\ContractsController::download/$1');
    $routes->post('contracts/upload-signed', 'user\ContractsController::uploadSigned');
});

// Routes administratives
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('suppliers', 'SuppliersController::index');
    $routes->get('contracts', 'ContratController::index'); 
    $routes->post('addsuppliers', 'SuppliersController::create');
    $routes->get('supplier/view/(:num)', 'InfoSupplierController::view/$1');
    $routes->post('supplier/reject/(:num)', 'InfoSupplierController::reject/$1');
    $routes->post('supplier/accept/(:num)', 'InfoSupplierController::accept/$1');
    $routes->get('contracts/delete/(:num)', 'ContratController::deleteContract/$1');
});
