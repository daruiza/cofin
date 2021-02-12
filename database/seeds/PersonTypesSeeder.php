<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonTypesSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('person_type')->insert(array(			
			'code' => '0',
            'type' => 'Persona Natural'
		));

		DB::table('person_type')->insert(array(			
			'code' => '1',
            'type' => 'Pesona Juridica'
		));
		
    }
}