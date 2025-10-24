<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateEkstrakurikulerTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreateEkstrakurikulerTable extends Migration
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
		'nama_ekstrakurikuler' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'deskripsi' => [
			'type' => 'TEXT',
			'null' => true,
		],
		'icon' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'pembimbing' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => true,
		],
		'jadwal' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
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
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');




        // Create Table ...
        $this->forge->createTable('ekstrakurikuler');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('ekstrakurikuler');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}