
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoiceDetailsSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('invoices_detail')->insert(array(
            'price' => 750000,
            'volume' => 1,
            'description' => 'Descripción de Detalle',
            'invoice_id' => 1
        ));

        DB::table('invoices_detail')->insert(array(
            'price' => 5000,
            'volume' => 2,
            'description' => 'Descripción de Inpuestos',
            'invoice_id' => 1
        ));
        
        DB::table('invoices_detail')->insert(array(
            'price' => 345000,
            'volume' => 1,
            'description' => 'Descripción de Detalle',
            'invoice_id' => 2
		));

    }

}