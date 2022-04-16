
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
            'name' => 'Creada', 
            'description' => 'Factura Creada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Produccion', 
            'description' => 'Factura en Producción',
        ));
        DB::table('invoices_status')->insert(array(
            'name' => 'Pendiente',
            'description' => 'Factura Pendiente',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Retenida',
            'description' => 'Factura en Retenida',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Iniciada',
            'description' => 'Factura Iniciada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Aceptada',
            'description' => 'Factura Aceptada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Rechazada',
            'description' => 'Factura Rechazada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Fallida',
            'description' => 'Factura Fallida',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Reversada',
            'description' => 'Factura Reversada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Expirada',
            'description' => 'Factura Expirada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Abandonada',
            'description' => 'Factura Abandonada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Cancelada',
            'description' => 'Factura Cancelada',
        ));

        DB::table('invoices_status')->insert(array(
            'name' => 'Antifraude',
            'description' => 'Factura Antifraude',
        ));
    }
}
