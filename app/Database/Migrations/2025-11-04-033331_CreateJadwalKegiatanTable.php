<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalKegiatanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'waktu_mulai' => [
                'type' => 'TIME',
            ],
            'waktu_selesai' => [
                'type' => 'TIME',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'klasifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pagi','siang','malam'],
                'null' => true,
                'comment' => 'pagi = 03.00–11.59, siang = 12.00–17.59, malam = 18.00–02.59',
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
        $this->forge->createTable('jadwal_kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal_kegiatan');
    }
}