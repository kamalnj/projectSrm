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

// Admin routes
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('suppliers', 'SuppliersController::index'); 
    $routes->post('addsuppliers', 'SuppliersController::create');
    $routes->post('search/ajax', 'SearchController::ajaxSearch');



});

// User routes
$routes->group('dashboard', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('/', 'user\UserController::index');
});
