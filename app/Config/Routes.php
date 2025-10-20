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



// ADMIN ROUTES
// Auth 
$routes->get('b0/login', 'Auth::index');
$routes->post('b0/login/submit', 'Auth::submit');
$routes->get('b0/logout', 'Auth::logout');

// Dashboard 
$routes->get('admin/dashboard', 'Admin::dashboard');

// Pendaftaran
$routes->get('admin/pendaftaran', 'Admin::pendaftaran');
$routes->get('admin/pendaftaran/detail/(:num)', 'Admin::detail_pendaftaran/$1');
$routes->get('admin/pendaftaran/verifikasi/(:num)/(:any)', 'Admin::verifikasi_pendaftaran/$1/$2');

// Ekstrakurikuler
$routes->get('admin/ekstrakurikuler', 'Admin::ekstrakurikuler');
$routes->get('admin/ekstrakurikuler/tambah', 'Admin::tambah_ekstrakurikuler');
$routes->post('admin/ekstrakurikuler/simpan', 'Admin::simpan_ekstrakurikuler');
$routes->get('admin/ekstrakurikuler/edit/(:num)', 'Admin::edit_ekstrakurikuler/$1');
$routes->post('admin/ekstrakurikuler/update/(:num)', 'Admin::update_ekstrakurikuler/$1');
$routes->get('admin/ekstrakurikuler/hapus/(:num)', 'Admin::hapus_ekstrakurikuler/$1');

// Pengajar
$routes->get('admin/pengajar', 'Admin::pengajar');
$routes->get('admin/pengajar/tambah', 'Admin::tambah_pengajar');
$routes->post('admin/pengajar/simpan', 'Admin::simpan_pengajar');
$routes->get('admin/pengajar/edit/(:num)', 'Admin::edit_pengajar/$1');
$routes->post('admin/pengajar/update/(:num)', 'Admin::update_pengajar/$1');
$routes->get('admin/pengajar/hapus/(:num)', 'Admin::hapus_pengajar/$1');

//Santri
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('santri', 'Admin::santri');
    $routes->get('santri/tambah', 'Admin::santri_tambah');
    $routes->post('santri/simpan', 'Admin::santri_simpan');
    $routes->get('santri/edit/(:num)', 'Admin::santri_edit/$1');
    $routes->post('santri/update/(:num)', 'Admin::santri_update/$1');
    $routes->get('santri/hapus/(:num)', 'Admin::santri_hapus/$1');
});



