<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sends', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('product');
            $table->string('client');
            $table->string('provider');
            $table->string('date_send');
            $table->string('hour_send');
            $table->string('date_arrival');
            $table->string('product_output');
            $table->string('arrival_product');
            $table->float('price', 8, 2);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sends');
    }
}
