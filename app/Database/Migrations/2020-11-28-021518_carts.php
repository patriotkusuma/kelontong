<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'cart_id'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'user_id'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'null'				=> TRUE,
			],
			'product_id'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'null'				=> TRUE,
			],
			'qty'					=> [
				'type'				=> 'INT',
				'constraint'		=> 5,
				'null'				=> TRUE,
			],
		]);

		$this->forge->addPrimaryKey('cart_id');
		$this->forge->addForeignKey('user_id','users','user_id','CASCADE','CASCADE');
		$this->forge->createTable('carts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
