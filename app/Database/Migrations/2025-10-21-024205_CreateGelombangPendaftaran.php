<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGelombangPendaftaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'seleksi' => [
                'type'    => 'JSON',
                'null'    => true,
                'comment' => 'Daftar jenis seleksi (misal ["Akademik","Tilawah"])',
            ],
            'jadwal_seleksi' => [
                'type'    => 'JSON',
                'null'    => true,
                'comment' => 'Jadwal tiap seleksi (misal [{"Akademik":"2025-11-01"}])',
            ],
            'metode' => [
                'type'    => 'JSON',
                'null'    => true,
                'comment' => 'Metode tiap seleksi (misal [{"Akademik":"online"},{"Tilawah":"offline"}])',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['dibuka', 'ditutup', 'berakhir'],
                'default'    => 'dibuka',
                'comment'    => 'Status gelombang: dibuka, ditutup, atau berakhir',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('gelombang_pendaftaran');
    }

    public function down()
    {
        $this->forge->dropTable('gelombang_pendaftaran');
    }
}