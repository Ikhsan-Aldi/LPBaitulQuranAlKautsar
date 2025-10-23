<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIconToEkstrakurikuler extends Migration
{
    public function up()
    {
        $this->forge->addColumn('ekstrakurikuler', [
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'deskripsi' // opsional, posisi kolom
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('ekstrakurikuler', 'icon');
    }
}
