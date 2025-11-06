<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalKegiatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // 🌅 Pagi Hari
            [
                'nama_kegiatan' => 'Bangun tidur & persiapan tahajjud',
                'waktu_mulai'   => '03:00:00',
                'waktu_selesai' => '03:30:00',
                'deskripsi'     => 'Bangun tidur, bersuci, dan mempersiapkan diri untuk shalat tahajjud.',
                'klasifikasi'   => 'pagi',
            ],
            [
                'nama_kegiatan' => "Tahajjud, Sholat Shubuh berjama'ah",
                'waktu_mulai'   => '03:30:00',
                'waktu_selesai' => '04:30:00',
                'deskripsi'     => 'Melaksanakan shalat tahajjud, kemudian shalat shubuh berjamaah di masjid.',
                'klasifikasi'   => 'pagi',
            ],
            [
                'nama_kegiatan' => 'Halaqah Tahfidz I',
                'waktu_mulai'   => '04:30:00',
                'waktu_selesai' => '06:00:00',
                'deskripsi'     => 'Kegiatan setoran dan hafalan Al-Qur\'an bersama ustadz pembimbing.',
                'klasifikasi'   => 'pagi',
            ],
            [
                'nama_kegiatan' => 'Kegiatan Belajar Mengajar Formal',
                'waktu_mulai'   => '07:30:00',
                'waktu_selesai' => '11:30:00',
                'deskripsi'     => 'Pelajaran formal di sekolah, mencakup mata pelajaran umum dan agama.',
                'klasifikasi'   => 'pagi',
            ],

            // 🌤️ Siang & Sore
            [
                'nama_kegiatan' => "Sholat Dhuhur, Muroja'ah Tahfidz",
                'waktu_mulai'   => '11:30:00',
                'waktu_selesai' => '13:00:00',
                'deskripsi'     => 'Shalat dhuhur berjamaah dilanjutkan dengan muroja\'ah hafalan.',
                'klasifikasi'   => 'siang',
            ],
            [
                'nama_kegiatan' => 'Makan siang, Istirahat Siang',
                'waktu_mulai'   => '13:00:00',
                'waktu_selesai' => '14:45:00',
                'deskripsi'     => 'Makan siang bersama dan waktu istirahat bagi santri.',
                'klasifikasi'   => 'siang',
            ],
            [
                'nama_kegiatan' => 'Halaqah Tahfidz II / Ekstrakurikuler',
                'waktu_mulai'   => '15:30:00',
                'waktu_selesai' => '17:00:00',
                'deskripsi'     => 'Kegiatan tahfidz lanjutan atau kegiatan ekstrakurikuler sore.',
                'klasifikasi'   => 'sore',
            ],

            // 🌙 Malam Hari
            [
                'nama_kegiatan' => 'Sholat Maghrib, Kajian Kitab',
                'waktu_mulai'   => '17:30:00',
                'waktu_selesai' => '18:45:00',
                'deskripsi'     => 'Shalat maghrib berjamaah diikuti dengan kajian kitab bersama ustadz.',
                'klasifikasi'   => 'malam',
            ],
            [
                'nama_kegiatan' => "Sholat Isya', Makan malam",
                'waktu_mulai'   => '18:45:00',
                'waktu_selesai' => '20:00:00',
                'deskripsi'     => 'Shalat isya berjamaah kemudian makan malam bersama.',
                'klasifikasi'   => 'malam',
            ],
            [
                'nama_kegiatan' => 'Belajar malam / Halaqah Tahfidz',
                'waktu_mulai'   => '20:00:00',
                'waktu_selesai' => '21:30:00',
                'deskripsi'     => 'Kegiatan belajar malam atau tahfidz lanjutan bagi santri.',
                'klasifikasi'   => 'malam',
            ],
            [
                'nama_kegiatan' => 'Istirahat malam',
                'waktu_mulai'   => '21:30:00',
                'waktu_selesai' => '03:00:00',
                'deskripsi'     => 'Waktu istirahat dan tidur malam hingga menjelang tahajjud.',
                'klasifikasi'   => 'malam',
            ],
        ];

        $this->db->table('jadwal_kegiatan')->insertBatch($data);
    }
}
