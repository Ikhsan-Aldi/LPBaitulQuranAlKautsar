<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->get('profil', 'Home::profil');
$routes->get('kontak', 'Home::kontak');
$routes->get('lainnya', 'Home::lainnya');



$routes->get('pendaftaran', 'Pendaftaran::index');
$routes->post('pendaftaran/simpan', 'Pendaftaran::simpan');



$routes->get('login', 'Auth::index');
$routes->post('login/submit', 'Auth::submit');
$routes->get('logout', 'Auth::logout');

// Dashboard admin
$routes->get('admin/dashboard', 'Admin::dashboard');

// Pendaftaran
$routes->get('admin/pendaftaran', 'Admin::pendaftaran');
$routes->get('admin/pendaftaran/detail/(:num)', 'Admin::detail_pendaftaran/$1');
$routes->get('admin/pendaftaran/verifikasi/(:num)/(:any)', 'Admin::verifikasi_pendaftaran/$1/$2');

// $routes->get('/', 'LandingPage::index');
// $routes->get('/home', 'Home::index');