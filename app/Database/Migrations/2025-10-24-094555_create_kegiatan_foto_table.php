<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateKegiatanFotoTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreateKegiatanFotoTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id_foto' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true,
		],
		'id_kegiatan' => [
			'type' => 'INT',
			'null' => false,
		],
		'file_name' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false,
		],
		'created_at' => [
			'type' => 'DATETIME',
			'null' => true,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id_foto');

		$this->forge->addKey('id_kegiatan');


		$this->forge->addForeignKey('id_kegiatan','kegiatan','id','CASCADE','NO ACTION');

        // Create Table ...
        $this->forge->createTable('kegiatan_foto');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('kegiatan_foto');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}