<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
	public function up()
	{
		// Attribute Table Produk
		$this->forge->addField([
			'product_id'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'unsignedd'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'sku'					=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 13,
			],
			'name'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
			],
			'product_slug'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
			],
			'category_id'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
			],
			'harga'					=> [
				'type'				=> 'REAL',
				'constraint'		=> 20,
				'null'				=> TRUE,
			],
			'stok'					=> [
				'type'				=> 'int',
				'constraint'		=> 11,
				'null'				=> TRUE,
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'ACTIVE', 'INACTIVE",
				'default'			=> 'ACTIVE'
			],
		]);

		$this->forge->addPrimaryKey('product_id');
		$this->forge->addForeignKey('category_id','categories','category_id','CASCADE','CASCADE');
		$this->forge->addUniqueKey('sku');
		$this->forge->addUniqueKey('product_slug');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
