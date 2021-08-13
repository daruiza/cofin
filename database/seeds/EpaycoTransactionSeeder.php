<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpaycoTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('epayco_transactions')->insert(array(
            'success' => 1,
            'title_response' => 1,
            'text_response' => 1,
            'last_action' => 1,
            'ref_payco' => 1,
            'factura' => 1,
            'descripcion' => 1,
            'valor' => 1,
            'iva' => 1,
            'baseiva' => 1,
            'moneda' => 1,
            'estado' => 1,
            'respuesta' => 1,
            'autorizacion' => 1,
            'recibo' => 1,
            'fecha' => 1,
            'urlbanco' => 1,
            'transactionID' => 1,
            'ticketId' => 1,
            'commerce_id' => 1,
        ));
    }
}
