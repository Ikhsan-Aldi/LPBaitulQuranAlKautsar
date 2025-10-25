<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBeritaTable extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks (untuk jaga-jaga)
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_berita' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'unique'     => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'excerpt' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
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

        // Set primary key
        $this->forge->addKey('id_berita', true);

        // Buat tabel
        $this->forge->createTable('berita');

        // Aktifkan kembali foreign key checks
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->disableForeignKeyChecks();

        // Hapus tabel
        $this->forge->dropTable('berita', true);

        // Aktifkan kembali foreign key checks
        $this->db->enableForeignKeyChecks();
    }
}
