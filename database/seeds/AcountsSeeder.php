<?php

use Illuminate\Database\Seeder;

class AcountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('acounts')->insert(array(
			'name'=>'Basic',
			'invoices'=>64,			
			'label'=>'{}'			
			)
		);
		\DB::table('acounts')->insert(array(
			'name'=>'Standar',
			'invoices'=>256,			
			'label'=>'{}'			
			)
		);
		\DB::table('acounts')->insert(array(
			'name'=>'Premium',
			'invoices'=>512,			
			'label'=>'{}'			
			)
		);
    }
}
