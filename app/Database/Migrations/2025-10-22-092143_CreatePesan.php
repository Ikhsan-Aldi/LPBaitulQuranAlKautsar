<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'            => 'INT',
                'unsigned'        => true,
                'auto_increment'  => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'subjek' => [
                'type'       => 'ENUM',
                'constraint' => ['pendaftaran', 'program', 'beasiswa', 'lainnya'],
                'default'    => 'lainnya',
            ],
            'pesan' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pesan');
    }

    public function down()
    {
        $this->forge->dropTable('pesan');
    }
}
