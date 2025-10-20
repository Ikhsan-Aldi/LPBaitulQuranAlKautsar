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
}
