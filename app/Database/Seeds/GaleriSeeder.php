<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Kegiatan Alam Bebas',
                'deskripsi' => 'Kegiatan outdoor untuk mengembangkan jiwa petualang dan kepemimpinan santri',
                'kategori' => 'kegiatan',
                'gambar' => 'kegiatan-alam.jpg',
                'tanggal' => '2025-10-15',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Prestasi Olimpiade Matematika',
                'deskripsi' => 'Santri berhasil meraih juara 1 dalam olimpiade matematika tingkat kabupaten',
                'kategori' => 'prestasi',
                'gambar' => 'prestasi-olimpiade.jpg',
                'tanggal' => '2025-10-10',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Fasilitas Asrama Modern',
                'deskripsi' => 'Asrama dengan fasilitas lengkap untuk kenyamanan belajar santri',
                'kategori' => 'fasilitas',
                'gambar' => 'asrama-modern.jpg',
                'tanggal' => '2025-10-05',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Kegiatan Tahfidz Quran',
                'deskripsi' => 'Program menghafal Al-Quran dengan metode yang efektif',
                'kategori' => 'kegiatan',
                'gambar' => 'tahfidz-quran.jpg',
                'tanggal' => '2025-10-01',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Penghargaan Sekolah Terbaik',
                'deskripsi' => 'Pondok Pesantren Baitul Quran Al-Kautsar meraih penghargaan sekolah terbaik',
                'kategori' => 'prestasi',
                'gambar' => 'penghargaan-sekolah.jpg',
                'tanggal' => '2025-09-28',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Fasilitas Laboratorium',
                'deskripsi' => 'Laboratorium sains dengan peralatan modern untuk pembelajaran',
                'kategori' => 'fasilitas',
                'gambar' => 'laboratorium.jpg',
                'tanggal' => '2025-09-25',
                'status' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('galeri')->insertBatch($data);
    }
}
