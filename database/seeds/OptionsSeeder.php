
<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('options')->insert(array(
			'name'=>'index',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-list","maticon":"fiber_manual_record"}',
			'module_id'=>1			
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'show',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-list","maticon":"fiber_manual_record"}',
			'module_id'=>1	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'create',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-plus","maticon":"fiber_manual_record"}',
			'module_id'=>1	
			)
		);		
		\DB::table('options')->insert(array(
			'name'=>'edit',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-cogs","maticon":"fiber_manual_record"}',
			'module_id'=>1	
			)
		);		
		\DB::table('options')->insert(array(
			'name'=>'destroy',			
			'label'=>'{"menu":"page","method":"delete","icon":"fas fa-times-circle","maticon":"fiber_manual_record"}',
			'module_id'=>1	
			)
		);

	
    }
}
