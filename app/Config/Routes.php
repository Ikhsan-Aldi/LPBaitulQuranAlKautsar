<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// USER ROUTES
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->get('program', 'Home::program');
$routes->get('profil', 'Home::profil');
$routes->get('program', 'Home::program');
$routes->get('kontak', 'Home::kontak');
$routes->post('kirim-pesan', 'Home::kirimPesan');
$routes->get('galeri', 'Home::galeri');
$routes->get('pendaftaran', 'Home::pendaftaran');
$routes->get('pendaftaran/form', 'Home::formPendaftaran');
$routes->post('pendaftaran/simpan', 'Home::simpanPendaftaran');
$routes->get('pendaftaran/success', 'Home::successPendaftaran');

// ADMIN ROUTES

// Auth 
$routes->get('b0/login', 'Auth::index');
$routes->post('b0/login/submit', 'Auth::submit');
$routes->get('b0/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {

    // Dashboard 
    $routes->get('dashboard', 'Admin::dashboard');

    // Pendaftaran
    $routes->get('pendaftaran', 'Admin::pendaftaran');
    $routes->get('pendaftaran/detail/(:num)', 'Admin::detail_pendaftaran/$1');
    $routes->get('pendaftaran/verifikasi/(:num)/(:any)', 'Admin::verifikasi_pendaftaran/$1/$2');

    // Ekstrakurikuler
    $routes->get('ekstrakurikuler', 'Admin::ekstrakurikuler');
    $routes->get('ekstrakurikuler/tambah', 'Admin::ekstrakurikuler_tambah');
    $routes->post('ekstrakurikuler/simpan', 'Admin::ekstrakurikuler_simpan');
    $routes->get('ekstrakurikuler/edit/(:num)', 'Admin::ekstrakurikuler_edit/$1');
    $routes->post('ekstrakurikuler/update/(:num)', 'Admin::ekstrakurikuler_update/$1');
    $routes->get('ekstrakurikuler/hapus/(:num)', 'Admin::ekstrakurikuler_hapus/$1');

    // Pengajar
    $routes->get('pengajar', 'Admin::pengajar');
    $routes->get('pengajar/tambah', 'Admin::tambah_pengajar');
    $routes->post('pengajar/simpan', 'Admin::simpan_pengajar');
    $routes->get('pengajar/edit/(:num)', 'Admin::edit_pengajar/$1');
    $routes->post('pengajar/update/(:num)', 'Admin::update_pengajar/$1');
    $routes->get('pengajar/hapus/(:num)', 'Admin::hapus_pengajar/$1');
    $routes->get('pengajar/detail/(:num)', 'Admin::pengajarDetail/$1');

    // Pengajar
    $routes->get('pengajar', 'Admin::pengajar');
    $routes->get('pengajar/tambah', 'Admin::tambah_pengajar');
    $routes->post('pengajar/simpan', 'Admin::simpan_pengajar');
    $routes->get('pengajar/edit/(:num)', 'Admin::edit_pengajar/$1');
    $routes->post('pengajar/update/(:num)', 'Admin::update_pengajar/$1');
    $routes->get('pengajar/hapus/(:num)', 'Admin::hapus_pengajar/$1');
    $routes->get('pengajar/detail/(:num)', 'Admin::pengajarDetail/$1');

    // Gelombang Pendaftaran Routes
    $routes->get('gelombang', 'Admin::gelombang');
    $routes->get('gelombang/tambah', 'Admin::tambahGelombang');
    $routes->post('gelombang/simpan', 'Admin::simpanGelombang');
    $routes->get('gelombang/edit/(:num)', 'Admin::editGelombang/$1');
    $routes->post('gelombang/update/(:num)', 'Admin::updateGelombang/$1');
    $routes->get('gelombang/hapus/(:num)', 'Admin::hapusGelombang/$1');
    $routes->get('gelombang/detail/(:num)', 'Admin::gelombang_detail/$1');
    
    //Santri
    $routes->get('santri', 'Admin::santri');
    $routes->get('santri/tambah', 'Admin::santri_tambah');
    $routes->post('santri/simpan', 'Admin::santri_simpan');
    $routes->get('santri/edit/(:num)', 'Admin::santri_edit/$1');
    $routes->post('santri/update/(:num)', 'Admin::santri_update/$1');
    $routes->get('santri/hapus/(:num)', 'Admin::santri_hapus/$1');
    $routes->get('santri/detail/(:num)', 'Admin::santri_detail/$1');

    // Kegiatan
    $routes->get('kegiatan', 'Admin::kegiatan');
    $routes->get('kegiatan/tambah', 'Admin::kegiatan_tambah');
    $routes->post('kegiatan/simpan', 'Admin::kegiatan_simpan');
    $routes->get('kegiatan/edit/(:num)', 'Admin::kegiatan_edit/$1');
    $routes->post('kegiatan/update/(:num)', 'Admin::kegiatan_update/$1');
    $routes->get('kegiatan/hapus/(:num)', 'Admin::kegiatan_hapus/$1');
    $routes->get('kegiatan/detail/(:num)', 'Admin::kegiatan_detail/$1');
    $routes->get('kegiatan/hapus-foto/(:num)/(:num)', 'Admin::kegiatan_hapusFoto/$1/$2');

    // Pesan
    $routes->get('pesan', 'Admin::pesan');
    $routes->get('pesan/detail/(:num)', 'Admin::detailPesan/$1');
    $routes->get('pesan/hapus/(:num)', 'Admin::hapusPesan/$1');

    // Galeri
    $routes->get('galeri', 'Admin::galeri');
    $routes->get('galeri/tambah', 'Admin::galeri_tambah');
    $routes->post('galeri/simpan', 'Admin::galeri_simpan');
    $routes->get('galeri/edit/(:num)', 'Admin::galeri_edit/$1');
    $routes->post('galeri/update/(:num)', 'Admin::galeri_update/$1');
    $routes->get('galeri/hapus/(:num)', 'Admin::galeri_hapus/$1');
    $routes->get('galeri/detail/(:num)', 'Admin::galeri_detail/$1');
});





