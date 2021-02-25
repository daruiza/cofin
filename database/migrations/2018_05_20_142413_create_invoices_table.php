<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number',128)->unique();
            $table->string('description',256)->nullable();
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
            $table->integer('loop');
            $table->dateTime('loopDate');
            $table->integer('loopDay');
            $table->integer('invoices_status_id')->unsigned()->default(1);            
            $table->foreign('invoices_status_id')->references('id')->on('invoices_status')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('customer_id')->unsigned()->default(1);            
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
