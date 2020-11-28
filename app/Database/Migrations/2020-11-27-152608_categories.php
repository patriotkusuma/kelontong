<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'category_id'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'category_name'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 150,
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'ACTIVE','INACTIVE'",
				'default'			=> 'ACTIVE'
			],
		]);

		$this->forge->addKey('category_id', TRUE);
		$this->forge->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
