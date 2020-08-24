
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoicesStatusSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('invoices_status')->insert(array(
            'name' => 'create', 
            'description' => 'Factura Creada',
        ));
        
        DB::table('invoices_status')->insert(array(
            'name' => 'production', 
            'description' => 'Factura en Prodicción',
        ));
        
        DB::table('invoices_status')->insert(array(
            'name' => 'cancel',
            'description' => 'Factura Pagada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'consigned',
            'description' => 'Factura Consignada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'overdue',
            'description' => 'Factura no pagada',
        ));
        
        DB::table('invoices_status')->insert(array(
            'name' => 'delete', 
            'description' => 'Factura Borrada',
		));

    }

}