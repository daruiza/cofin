<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommerceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',128)->nullable()->default(null);
            $table->string('nit',128)->nullable()->default(null);
            $table->string('department',128)->nullable()->default(null);
            $table->string('city',128)->nullable()->default(null);
            $table->string('adress',256)->nullable()->default(null);
            $table->string('description',512)->nullable()->default(null);
            $table->string('logo', 256)->default('default.png');
            $table->string('currency', 32)->default('COP');
            $table->string('label',1024)->nullable()->default('');
            $table->string('apiLogin',128)->nullable()->default('');
            $table->string('apiKey',128)->nullable()->default('');
            $table->boolean('active')->default(true);            
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
        Schema::dropIfExists('commerces');
    }
}
