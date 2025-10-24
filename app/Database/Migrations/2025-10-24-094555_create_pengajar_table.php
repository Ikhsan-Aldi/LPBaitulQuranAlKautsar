<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreatePengajarTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreatePengajarTable extends Migration
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
		'nama_lengkap' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'nip' => [
			'type' => 'VARCHAR',
			'constraint' => 50,
			'null' => true,
		],
		'jabatan' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'no_hp' => [
			'type' => 'VARCHAR',
			'constraint' => 20,
			'null' => true,
		],
		'alamat' => [
			'type' => 'TEXT',
			'null' => true,
		],
		'foto' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
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
        $this->forge->createTable('pengajar');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('pengajar');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}