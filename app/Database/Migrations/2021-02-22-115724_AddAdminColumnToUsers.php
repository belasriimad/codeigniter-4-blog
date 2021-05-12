<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdminColumnToUsers extends Migration
{
	public function up()
	{
		//
		$fields = [
			'is_admin'          => [
				'type'           => 'BOOLEAN',
				'default'     => false
			]
		];

		$this->forge->addColumn('user', $fields);
	}

	public function down()
	{
		//
		$this->forge->dropColumn('user', 'is_admin');
	}
}
