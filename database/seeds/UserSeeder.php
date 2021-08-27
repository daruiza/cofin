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
			'identification' => 1039420537,
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
			'identification' => 1039420536,
			'name' => 'admin',
			'surname' => 'admin',
			'email' => 'admin@yopmail.com',
			'phone' => '3194062551',
			'password' => Hash::make('0000'),
			'rol_id' => 2,
			'acount_id' => 1,
			'commerce_id' => 1
		));

		DB::table('users')->insert(array(
			'identification' => 1039420535,
			'name' => 'Andres',
			'surname' => 'Ruiz',
			'email' => 'andresruiz@yopmail.com',
			'phone' => '3194062552',
			'password' => Hash::make('0000'),
			'rol_id' => 3,
			'acount_id' => 1,
			'commerce_id' => 1
		));

		DB::table('users')->insert(array(
			'identification' => 1039420538,
			'name' => 'Escamoso',
			'surname' => 'Escamoso',
			'email' => 'escamoso@yopmail.com',
			'phone' => '3194062553',
			'password' => Hash::make('0000'),
			'rol_id' => 3,
			'acount_id' => 1,
			'commerce_id' => 1
		));
	}
}
