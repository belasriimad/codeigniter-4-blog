<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageColumnToPostTable extends Migration
{
	public function up()
	{
		//
		$fields = [
			'post_image'         => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
				'default'     => null
			]
		];

		$this->forge->addColumn('post', $fields);
	}

	public function down()
	{
		//
		$this->forge->dropColumn('post', 'post_image');
	}
}
