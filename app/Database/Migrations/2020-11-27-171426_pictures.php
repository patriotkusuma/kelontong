<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pictures extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'picture_id'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'product_id'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'unsigned'			=> TRUE,
			],
			'picture_name'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250
			]
		]);

		$this->forge->addPrimaryKey('picture_id');
		$this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('pictures');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pictures');
	}
}
