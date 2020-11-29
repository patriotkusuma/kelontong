<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'transaction_id'			=> [
				'type'					=> 'BIGINT',
				'constraint'			=> 20,
				'unsigned'				=> TRUE,
				'auto_increment'		=> TRUE,
			],
			'user_id'					=> [
				'type'					=> 'BIGINT',
				'constraint'			=> 20,
				'unsigned'				=> TRUE,
				'null'					=> TRUE,
			],
			'date'						=> [
				'type'					=> 'DATETIME',
				'null'					=> TRUE,
			],
			'sub_total'					=> [
				'type'					=> 'INT',
				'constraint'			=> 11,
				'null'					=> TRUE,
			],
			'grand_total'				=> [
				'type'					=> 'BIGINT',
				'constraint'			=> 20,
				'null'					=> TRUE,
			]
		]);

		$this->forge->addPrimaryKey('transaction_id');
		$this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('transactions');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('transactions');
	}
}
