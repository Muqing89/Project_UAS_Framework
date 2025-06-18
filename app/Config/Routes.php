<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::login');
$routes->get('/dashboard', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/tables', 'Home::tables');
$routes->get('/kegiatan', 'Home::kegiatan');
$routes->get('/keuangan', 'Home::keuangan');
$routes->get('/laporan', 'Home::laporan');
$routes->get('/forgotpassword', 'Home::forgotpassword');
$routes->get('/inputkegiatan', 'Home::inputkegiatan');
$routes->get('/inputlaporan', 'Home::inputlaporan');