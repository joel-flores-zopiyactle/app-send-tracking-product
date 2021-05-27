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
            $table->string('departure_location'); //Salida
            $table->string('arrival_location'); //Destino
            $table->float('price', 8, 2);
            $table->boolean('completed')->default(false);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
