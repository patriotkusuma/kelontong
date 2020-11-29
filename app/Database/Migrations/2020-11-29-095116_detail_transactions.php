<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransactions extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'transaction_id'			=> [
				'type'					=> 'BIGINT',
				'constraint'			=> 20,
				'unsigned'				=> TRUE
			],
			'product_id'				=> [
				'type'					=> 'BIGINT',
				'constraint'			=> 20,
				'unsigned'				=> TRUE,
			],
			'qty'						=> [
				'type'					=> 'INT',
				'constraint'			=> 11,
				'null'					=> TRUE
			]
		]);

		$this->forge->addForeignKey('product_id','products','product_id','CASCADE','CASCADE');
		$this->forge->addForeignKey('transaction_id','transactions','transaction_id','CASCADE','CASCADE');
		$this->forge->createTable('detail_transactions');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('detail_transactions');
	}
}
