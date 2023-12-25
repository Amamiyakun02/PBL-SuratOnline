<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->post('/getDesa', 'AuthController::getDesa');

// Routing authorization
$routes->group('/', function ($routes) {
    $routes->get('', 'AuthController::index');
    $routes->post('', 'AuthController::index');
    $routes->post('login', 'AuthController::login');
    $routes->get('register', 'AuthController::register');
    $routes->post('register_add', 'UserController::register');
    $routes->get('penduduk-login', 'AuthController::PendudukLogin');
    $routes->get('set-password', 'AuthController::set_password');
    $routes->get('lupa-password', 'AuthController::LupaPassword');
    $routes->get('otp-verification', 'AuthController::otp');
    $routes->get('logout', 'AuthController::logout');
});

// Routing dashboard
$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Home::dashboard');
    // $routes->get('layout', 'Home::layout');
});

// Routing kelola user
$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('tambah', 'UserController::add_user');
    $routes->post('save', 'UserController::insert');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->post('update', 'UserController::update');
    $routes->get('delete/(:num)', 'UserController::delete/$1');
});

// Routing kelola surat
$routes->group('surat', function ($routes) {
    $routes->get('/', 'ArsipController::index');
    $routes->get('editor', 'ArsipController::create');
    $routes->post('save', 'ArsipController::insert');
//    $routes->get('daftar-surat', 'ArsipController::list');
    $routes->get('surat-masuk', 'ArsipController::surat_masuk');
    $routes->get('surat-desa/(:num)', 'ArsipController::surat/$1');
});

// Routing kelola kecamatan
$routes->group('kecamatan', function ($routes) {
    $routes->get('/', 'KecamatanController::index');
    $routes->get('tambah', 'KecamatanController::tambah_kecamatan');
    $routes->post('save', 'KecamatanController::insert');
    $routes->get('edit/(:num)', 'KecamatanController::edit/$1');
    $routes->post('update', 'KecamatanController::update');
    $routes->get('delete/(:num)', 'KecamatanController::delete/$1');
});

// Routing kelola desa
$routes->group('desa', function ($routes) {
    $routes->get('/', 'DesaController::index');
    $routes->get('tambah', 'DesaController::tambah_desa');
    $routes->post('save', 'DesaController::insert');
    $routes->get('edit/(:num)', 'DesaController::edit/$1');
    $routes->post('update', 'DesaController::update');
    $routes->get('delete/(:num)', 'DesaController::delete/$1');
});


// Routing kelola penduduk
$routes->group('penduduk', function ($routes) {
    $routes->get('/', 'PendudukController::index');
    $routes->get('tambah', 'PendudukController::tambah_penduduk');
    $routes->post('save', 'PendudukController::insert');
    $routes->get('edit/(:num)', 'PendudukController::edit/$1');
    $routes->post('update', 'PendudukController::update');
    $routes->get('delete/(:num)', 'PendudukController::delete/$1');
});


$routes->group('surat-dinamis', function ($routes) {
    $routes->get('/', 'Penduduk\HomePendudukController::index');
    $routes->get('daftar-surat', 'Penduduk\HomePendudukController::list');
    $routes->get('notif', 'Penduduk\HomePendudukController::notif');
});


// Routing logout
$routes->group('logout', function ($routes) {
    $routes->get('/', 'AuthController::logout');
});