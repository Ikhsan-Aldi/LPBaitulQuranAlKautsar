<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateSantriTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreateSantriTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true,
		],
		'id_pendaftaran' => [
			'type' => 'INT',
			'null' => true,
		],
		'nama_lengkap' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => true,
		],
		'jenis_kelamin' => [
			'type' => 'ENUM',
			'constraint' => [ 'Laki-laki', 'Perempuan'],
			'null' => true,
		],
		'tempat_lahir' => [
			'type' => 'VARCHAR',
			'constraint' => 50,
			'null' => true,
		],
		'tanggal_lahir' => [
			'type' => 'DATE',
			'null' => true,
		],
		'nis' => [
			'type' => 'VARCHAR',
			'constraint' => 20,
			'null' => true,
		],
		'nisn' => [
			'type' => 'VARCHAR',
			'constraint' => 20,
			'null' => true,
		],
		'nama' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => true,
		],
		'jenjang' => [
			'type' => 'ENUM',
			'constraint' => [ 'SMP', 'SMA'],
			'null' => true,
		],
		'asal_sekolah' => [
			'type' => 'VARCHAR',
			'constraint' => 150,
			'null' => true,
		],
		'alamat' => [
			'type' => 'TEXT',
			'null' => true,
		],
		'nama_ayah' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => true,
		],
		'nama_ibu' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => true,
		],
		'no_hp' => [
			'type' => 'VARCHAR',
			'constraint' => 20,
			'null' => true,
		],
		'no_hp_ortu' => [
			'type' => 'VARCHAR',
			'constraint' => 15,
			'null' => true,
		],
		'ktp_ortu' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'akta_kk' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'surat_ket_lulus' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'ijazah_terakhir' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'foto' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'status' => [
			'type' => 'ENUM',
			'constraint' => [ 'Aktif', 'Lulus', 'Nonaktif'],
			'null' => true,
		],
		'created_at' => [
			'type' => 'DATETIME',
			'null' => true,
		],
		'updated_at' => [
			'type' => 'DATETIME',
			'null' => true,
		],
		'tanggal_daftar' => [
			'type' => 'DATETIME',
			'null' => true,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');

		$this->forge->addKey('id_pendaftaran');

		$this->forge->addUniqueKey('nis');

		$this->forge->addForeignKey('id_pendaftaran','pendaftaran','id_pendaftaran','CASCADE','NO ACTION');

        // Create Table ...
        $this->forge->createTable('santri');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('santri');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}