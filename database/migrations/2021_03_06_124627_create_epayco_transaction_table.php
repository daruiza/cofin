<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpaycoTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epayco_transactions', function (Blueprint $table) {
            $table->id();
            $table->boolean('success');
            $table->string('title_response');
            $table->string('text_response');
            $table->string('last_action');
            $table->double('ref_payco');
            $table->string('factura');
            $table->string('descripcion');
            $table->integer('valor');
            $table->integer('iva');
            $table->integer('baseiva');
            $table->string('moneda');
            $table->string('estado');
            $table->string('respuesta');
            $table->string('autorizacion');
            $table->string('recibo');
            $table->dateTime('fecha');
            $table->string('urlbanco');
            $table->string('transactionID');
            $table->string('ticketId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epayco_transactions');
    }
}
