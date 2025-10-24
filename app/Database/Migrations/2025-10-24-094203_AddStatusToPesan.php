<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToPesan extends Migration
{
    public function up()
    {
        // Nonaktifkan pemeriksaan foreign key
        $this->db->disableForeignKeyChecks();

        // Tambah kolom baru 'status'
        $fields = [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['belum_dibaca', 'dibaca'],
                'default'    => 'belum_dibaca',
                'null'       => false,
                'after'      => 'pesan' // diletakkan setelah kolom 'pesan'
            ],
        ];

        $this->forge->addColumn('pesan', $fields);

        // Aktifkan kembali pemeriksaan foreign key
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        // Nonaktifkan pemeriksaan foreign key
        $this->db->disableForeignKeyChecks();

        // Hapus kolom 'status' jika migrasi dibatalkan
        $this->forge->dropColumn('pesan', 'status');

        // Aktifkan kembali pemeriksaan foreign key
        $this->db->enableForeignKeyChecks();
    }
}
