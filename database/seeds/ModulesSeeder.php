<?php

use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('modules')->insert(array(
			'name'=>'Rols',
			'description'=>'ModuleRols',
			'label'=>'{"action":"rol","maticon":"fiber_manual_record"}'			
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Modules',
			'description'=>'ModuleModules',
			'label'=>'{"action":"module","maticon":"fiber_manual_record"}'
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Options',
			'description'=>'ModuleOptions',
			'label'=>'{"action":"option","maticon":"fiber_manual_record"}'
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Users',
			'description'=>'ModuleUsers',
			'label'=>'{"action":"user","maticon":"fiber_manual_record"}'
			)
		);	
		\DB::table('modules')->insert(array(
			'name'=>'Commerce',
			'description'=>'ModuleCommerces',
			'label'=>'{"action":"commerce","maticon":"fiber_manual_record"}'
			)
		);	
		\DB::table('modules')->insert(array(
			'name'=>'Invoices',
			'description'=>'ModuleInvoices',
			'label'=>'{"action":"invoice","maticon":"assignment"}'
			)
		);
		
    }
}