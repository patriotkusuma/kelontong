<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		// atribute table user
		$this->forge->addField([
			'user_id'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'name'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
			],
			'username'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 25,
			],
			'email'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
			],
			'password'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
			],
			'profile_picture'		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
			],
			'phone'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 15,
			],
			'address'				=> [
				'type'				=> 'TEXT',
				'constraint'		=> 250,
				'null'				=> TRUE,
			],
			'user_role'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'ADMIN','USER'",
				'default'			=> 'USER'
			],
		]);

		$this->forge->addKey('user_id', TRUE);
		$this->forge->addUniqueKey('username');
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
