<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateAdminTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreateAdminTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id_admin' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true,
		],
		'username' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'password' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false,
		],
		'nama_lengkap' => [
			'type' => 'VARCHAR',
			'constraint' => 150,
			'null' => true,
		],
		'created_at' => [
			'type' => 'TIMESTAMP',
			'null' => true,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id_admin');




        // Create Table ...
        $this->forge->createTable('admin');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('admin');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}