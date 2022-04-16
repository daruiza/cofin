<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('customers')->insert(array(
			'document_type' => 1,
			'user_id' => 3,
			'commerce_id' => 1
		));

		DB::table('customers')->insert(array(
			'document_type' => 1,
			'user_id' => 4,
			'commerce_id' => 1
		));
	}
}
