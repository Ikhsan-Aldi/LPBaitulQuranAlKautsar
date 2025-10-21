<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->get('program', 'Home::program');
$routes->get('profil', 'Home::profil');
$routes->get('program', 'Home::program');
$routes->get('kontak', 'Home::kontak');
$routes->get('lainnya', 'Home::lainnya');
$routes->get('pendaftaran', 'Home::pendaftaran');
$routes->get('pendaftaran/form', 'Home::formPendaftaran');
$routes->post('pendaftaran/simpan', 'Home::simpanPendaftaran');
$routes->get('pendaftaran/success', 'Home::successPendaftaran');

// $routes->get('pendaftaran', 'Pendaftaran::index');
// $routes->post('pendaftaran/simpan', 'Pendaftaran::simpan');



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
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('ekstrakurikuler', 'Admin::ekstrakurikuler');
    $routes->get('ekstrakurikuler/tambah', 'Admin::ekstrakurikuler_tambah');
    $routes->post('ekstrakurikuler/simpan', 'Admin::ekstrakurikuler_simpan');
    $routes->get('ekstrakurikuler/edit/(:num)', 'Admin::ekstrakurikuler_edit/$1');
    $routes->post('ekstrakurikuler/update/(:num)', 'Admin::ekstrakurikuler_update/$1');
    $routes->get('ekstrakurikuler/hapus/(:num)', 'Admin::ekstrakurikuler_hapus/$1');
});


// Pengajar
$routes->get('admin/pengajar', 'Admin::pengajar');
$routes->get('admin/pengajar/tambah', 'Admin::tambah_pengajar');
$routes->post('admin/pengajar/simpan', 'Admin::simpan_pengajar');
$routes->get('admin/pengajar/edit/(:num)', 'Admin::edit_pengajar/$1');
$routes->post('admin/pengajar/update/(:num)', 'Admin::update_pengajar/$1');
$routes->get('admin/pengajar/hapus/(:num)', 'Admin::hapus_pengajar/$1');
$routes->get('admin/pengajar/detail/(:num)', 'Admin::pengajarDetail/$1');


// Gelombang Pendaftaran Routes
$routes->get('admin/gelombang', 'Admin::gelombang');
$routes->get('admin/gelombang/tambah', 'Admin::tambahGelombang');
$routes->post('admin/gelombang/simpan', 'Admin::simpanGelombang');
$routes->get('admin/gelombang/edit/(:num)', 'Admin::editGelombang/$1');
$routes->post('admin/gelombang/update/(:num)', 'Admin::updateGelombang/$1');
$routes->get('admin/gelombang/hapus/(:num)', 'Admin::hapusGelombang/$1');

//Santri
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('santri', 'Admin::santri');
    $routes->get('santri/tambah', 'Admin::santri_tambah');
    $routes->post('santri/simpan', 'Admin::santri_simpan');
    $routes->get('santri/edit/(:num)', 'Admin::santri_edit/$1');
    $routes->post('santri/update/(:num)', 'Admin::santri_update/$1');
    $routes->get('santri/hapus/(:num)', 'Admin::santri_hapus/$1');
    $routes->get('santri/detail/(:num)', 'Admin::santriDetail/$1');

});

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('kegiatan', 'Admin::kegiatan');
    $routes->get('kegiatan/tambah', 'Admin::kegiatan_tambah');
    $routes->post('kegiatan/simpan', 'Admin::kegiatan_simpan');
    $routes->get('kegiatan/edit/(:num)', 'Admin::kegiatan_edit/$1');
    $routes->post('kegiatan/update/(:num)', 'Admin::kegiatan_update/$1');
    $routes->get('kegiatan/hapus/(:num)', 'Admin::kegiatan_hapus/$1');
});




