<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert(array(
			'name' => 'super',
			'surname' => 'super',
			'email' => 'super@yopmail.com',
			'phone' => '3194062550',
			'password' => Hash::make('0000'),
			'rol_id' => 1,
			'acount_id' => 3,
			'commerce_id' => 1
		));

		DB::table('users')->insert(array(
			'name' => 'admin',
			'surname' => 'admin',
			'email' => 'admin@yopmail.com',
			'phone' => '3113333333',
			'password' => Hash::make('0000'),
			'rol_id' => 2,
			'acount_id' => 1,
			'commerce_id' => 1
		));

		DB::table('users')->insert(array(
			'name' => 'perda',
			'surname' => 'pedra',
			'email' => 'pedra@yopmail.com',
			'phone' => '31122222222',
			'password' => Hash::make('0000'),
			'rol_id' => 3,
			'acount_id' => 1,
			'commerce_id' => 1
		));

		DB::table('users')->insert(array(
			'name' => 'Escamoso',
			'surname' => 'Escamoso',
			'email' => 'escamoso@yopmail.com',
			'phone' => '31122222222',
			'password' => Hash::make('0000'),
			'rol_id' => 3,
			'acount_id' => 1,
			'commerce_id' => 1
		));
	}
}
