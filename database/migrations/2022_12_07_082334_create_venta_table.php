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
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->integer('id_plan')->unsigned();
            $table->integer('domo_id')->unsigned();
            $table->double('pagoparcial');
            $table->double('totalpagoparcial');
            $table->date('fechareserva');
            $table->date('fechainicio');
            $table->date('fechafinal');
            $table->date('fechapagoparcial');
            $table->double('totalservicio');
            $table->integer('estado');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_plan')->references('id')->on('plan');
            $table->foreign('domo_id')->references('id')->on('domo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
};
