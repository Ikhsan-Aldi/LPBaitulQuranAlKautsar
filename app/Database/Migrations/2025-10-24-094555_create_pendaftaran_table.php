<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreatePendaftaranTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreatePendaftaranTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id_pendaftaran' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true,
		],
		'jenjang' => [
			'type' => 'ENUM',
			'constraint' => [ 'SMP', 'SMA'],
			'null' => true,
		],
		'nama_lengkap' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'jenis_kelamin' => [
			'type' => 'ENUM',
			'constraint' => [ 'Laki-laki', 'Perempuan'],
			'null' => false,
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
		'asal_sekolah' => [
			'type' => 'VARCHAR',
			'constraint' => 150,
			'null' => true,
		],
		'nisn' => [
			'type' => 'VARCHAR',
			'constraint' => 20,
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
			'constraint' => [ 'Menunggu Verifikasi', 'Diterima', 'Ditolak'],
			'null' => true,
		],
		'tanggal_daftar' => [
			'type' => 'DATETIME',
			'null' => true,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id_pendaftaran');




        // Create Table ...
        $this->forge->createTable('pendaftaran');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('pendaftaran');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}