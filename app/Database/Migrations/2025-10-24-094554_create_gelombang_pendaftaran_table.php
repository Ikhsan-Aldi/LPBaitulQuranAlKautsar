<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateGelombangPendaftaranTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreateGelombangPendaftaranTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id' => [
			'type' => 'INT',
			'null' => false,
			'unsigned' => true,
			'auto_increment' => true,
		],
		'nama' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
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
			'type' => 'JSON',
			'null' => true,
		],
		'jadwal_seleksi' => [
			'type' => 'JSON',
			'null' => true,
		],
		'metode' => [
			'type' => 'JSON',
			'null' => true,
		],
		'status' => [
			'type' => 'ENUM',
			'constraint' => [ 'dibuka', 'ditutup', 'berakhir'],
			'null' => false,
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

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');




        // Create Table ...
        $this->forge->createTable('gelombang_pendaftaran');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('gelombang_pendaftaran');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}