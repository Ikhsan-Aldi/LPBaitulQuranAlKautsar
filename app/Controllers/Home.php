<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda - Solusi Digital Terdepan'
        ];
        return view('lp/home', $data);
    }

    public function tentang()
    {
        $data = [
            'title' => 'Tentang Kami - Solusi Digital Terdepan'
        ];
        return view('lp/tentang', $data);
    }

    public function program()
    {
        // Ambil data ekstrakurikuler dari model
        $ekstrakurikulerModel = new \App\Models\EkstrakurikulerModel();
        $ekstrakurikuler = $ekstrakurikulerModel->findAll();
    
        $data = [
            'title' => 'Program & Kegiatan - Baitul Quran Al-Kautsar',
            'meta_description' => 'Program pendidikan terpadu Baitul Quran Al-Kautsar - Tahfizh Quran, Kajian Kitab, Ekstrakurikuler, dan kegiatan harian santri',
            'meta_keywords' => 'program pesantren, kegiatan santri, tahfizh quran, ekstrakurikuler islami, jadwal pesantren',
            'ekstrakurikuler' => $ekstrakurikuler
        ];
        return view('lp/program', $data);
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak - Solusi Digital Terdepan'
        ];
        return view('lp/kontak', $data);
    }

    public function lainnya()
    {
        $data = [
            'title' => 'Lainnya - Solusi Digital Terdepan'
        ];
        return view('lp/lainnya', $data);
    }
}
