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
        Schema::create('domo_caracteristica', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('domo_id')->unsigned();
            $table->integer('cantidad');
            $table->integer('caracteristica_id')->unsigned();
            $table->foreign('domo_id')->references('id')->on('domo');
            $table->foreign('caracteristica_id')->references('id')->on('caracteristica');
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
        Schema::dropIfExists('domo_caracteristica');
    }
};
