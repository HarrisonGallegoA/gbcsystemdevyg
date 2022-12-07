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
        Schema::create('plan', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre', 50)->unique();
            $table->integer('domo_id')->unsigned();
            $table->string('descripcion', 60);
            $table->double('totalservicio');
            $table->double('precioplan');
            $table->double('totalplan');
            $table->integer('estado'); 
            $table->foreign('domo_id')->references('id')->on('domo');
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
        Schema::dropIfExists('plan');
    }
};
