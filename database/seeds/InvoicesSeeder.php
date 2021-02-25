
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoicesSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('invoices')->insert(array(
            'name' => 'ServicioHosting',
            'number' => 'ABC321',
            'description' => 'Descripción de Sercvicio',
            'dateStart' => Carbon::now(),
            'dateEnd' => Carbon::now()->addMonth(1),
            'loop' => 7,			
            'loopDate' => Carbon::now()->addWeek(1),			
            'loopDay' => 1,	
            'invoices_status_id' => 2,
			'customer_id' => 1
        ));
        

        DB::table('invoices')->insert(array(
            'name' => 'ServicioHosting',
            'number' => 'ABC322',
            'description' => 'Descripción de Sercvicio',
            'dateStart' => Carbon::now(),
            'dateEnd' => Carbon::now()->addMonth(1),
            'loop' => 7,			
            'loopDate' => Carbon::now()->addWeek(1),			
            'loopDay' => 1,	
            'invoices_status_id' => 2,
			'customer_id' => 1
		));

    }

}