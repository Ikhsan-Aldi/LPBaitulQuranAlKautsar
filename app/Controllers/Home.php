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
    public function tentangindex()
    {
        $data = [
            'title' => 'Tentang Kami - Baitul Quran Al-Kautsar',
            'activeTab' => 'tentang'
        ];
        return view('tentang', $data);
    }
    
    public function visiMisi()
    {
        $data = [
            'title' => 'Visi & Misi - Baitul Quran Al-Kautsar',
            'activeTab' => 'visi-misi'
        ];
        return view('tentang', $data);
    }
    
    public function sejarah()
    {
        $data = [
            'title' => 'Sejarah - Baitul Quran Al-Kautsar',
            'activeTab' => 'sejarah'
        ];
        return view('tentang', $data);
    }
    public function profil()
    {
        $data = [
            'title' => 'Profil - Solusi Digital Terdepan'
        ];
        return view('lp/profil', $data);
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

    public function program()
    {
        $data = [
            'title' => 'Program - Baitul Quran Al-Kautsar'
        ];
        return view('lp/program', $data);
    }
}
