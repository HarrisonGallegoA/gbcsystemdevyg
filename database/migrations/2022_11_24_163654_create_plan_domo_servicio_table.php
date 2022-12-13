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
        Schema::create('plan_domo_servicio', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plan')
            ->onDelete('NO ACTION')
            ->onUpdate('NO ACTION');
            $table->foreign('servicio_id')->references('id')->on('servicios')
            ->onDelete('NO ACTION')
            ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_domo_servicio');
    }
};
