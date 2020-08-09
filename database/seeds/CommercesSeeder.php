<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommercesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commerces')->insert(array(        	
			'name'=>'Default',
			'department'=>'Antioquia',
			'city'=>'Medellín',
			'adress'=>'Cr 1 - 1 # 1',
			'description'=>'default store',
			'logo'=>'default.png',
			'currency'=>'COP',
			'label'=>'',
			)
		);		
    }
}