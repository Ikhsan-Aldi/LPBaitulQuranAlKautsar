<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdditionalFieldsToSantriTable extends Migration
{
    public function up()
    {
        $fields = [
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'id_pendaftaran',
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'null'       => true,
                'after'      => 'nama_lengkap',
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'jenis_kelamin',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
                'after' => 'tempat_lahir',
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'nis',
            ],
            'nama_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'alamat',
            ],
            'nama_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'nama_ayah',
            ],
            'no_hp_ortu' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'no_hp',
            ],
            'ktp_ortu' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'no_hp_ortu',
            ],
            'akta_kk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'ktp_ortu',
            ],
            'surat_ket_lulus' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'akta_kk',
            ],
            'ijazah_terakhir' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'surat_ket_lulus',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'ijazah_terakhir',
            ],
        ];

        $this->forge->addColumn('santri', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('santri', [
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'nisn',
            'nama_ayah',
            'nama_ibu',
            'no_hp_ortu',
            'ktp_ortu',
            'akta_kk',
            'surat_ket_lulus',
            'ijazah_terakhir',
            'foto'
        ]);
    }
}
