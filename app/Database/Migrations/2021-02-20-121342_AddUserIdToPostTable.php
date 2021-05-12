<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToPostTable extends Migration
{
	public function up()
	{
		//
		$fields = [
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true
			],
			'CONSTRAINT post_user_id_fk FOREIGN KEY(user_id) 
				REFERENCES user(id) ON DELETE CASCADE'
		];

		$this->forge->addColumn('post', $fields);
	}

	public function down()
	{
		//
		$this->forge->dropColumn('post', 'user_id');
	}
}

//ALTER TABLE post DROP FOREIGN KEY post_user_id_fk
