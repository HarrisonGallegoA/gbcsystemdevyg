<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->integer('reserva_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('reserva_id')->references('id')->on('reserva');
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
        Schema::dropIfExists('venta_detalle');
    }
};
