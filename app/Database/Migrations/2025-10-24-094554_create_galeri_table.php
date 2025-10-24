<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateGaleriTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 24 October, 2025 09:45:54 AM
 */

class CreateGaleriTable extends Migration
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
		'judul' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false,
		],
		'deskripsi' => [
			'type' => 'TEXT',
			'null' => true,
		],
		'kategori' => [
			'type' => 'ENUM',
			'constraint' => [ 'kegiatan', 'fasilitas', 'prestasi'],
			'null' => false,
		],
		'gambar' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => true,
		],
		'tanggal' => [
			'type' => 'DATE',
			'null' => true,
		],
		'status' => [
			'type' => 'ENUM',
			'constraint' => [ 'aktif', 'nonaktif'],
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
        $this->forge->createTable('galeri');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('galeri');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}