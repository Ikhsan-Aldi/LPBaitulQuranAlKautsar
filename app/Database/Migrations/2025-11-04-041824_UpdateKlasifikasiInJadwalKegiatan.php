<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateKlasifikasiInJadwalKegiatan extends Migration
{
    public function up()
    {
        // Ubah kolom ENUM 'klasifikasi' agar mencakup sore
        $fields = [
            'klasifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pagi', 'siang', 'sore', 'malam'],
                'null' => true,
                'comment' => 'pagi = 03.00–11.59, siang = 12.00–14.59, sore = 15.00–17.59, malam = 18.00–02.59',
            ],
        ];

        $this->forge->modifyColumn('jadwal_kegiatan', $fields);
    }

    public function down()
    {
        // Kembalikan ke versi sebelumnya tanpa sore
        $fields = [
            'klasifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pagi', 'siang', 'malam'],
                'null' => true,
                'comment' => 'pagi = 03.00–11.59, siang = 12.00–17.59, malam = 18.00–02.59',
            ],
        ];

        $this->forge->modifyColumn('jadwal_kegiatan', $fields);
    }
}
