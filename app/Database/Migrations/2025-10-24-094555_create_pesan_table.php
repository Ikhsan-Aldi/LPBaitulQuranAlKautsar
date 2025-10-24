<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreatePesanTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreatePesanTable extends Migration
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
		'nama_lengkap' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'email' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'telepon' => [
			'type' => 'VARCHAR',
			'constraint' => 20,
			'null' => true,
		],
		'subjek' => [
			'type' => 'ENUM',
			'constraint' => [ 'pendaftaran', 'program', 'beasiswa', 'lainnya'],
			'null' => false,
		],
		'pesan' => [
			'type' => 'TEXT',
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
        $this->forge->createTable('pesan');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('pesan');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}