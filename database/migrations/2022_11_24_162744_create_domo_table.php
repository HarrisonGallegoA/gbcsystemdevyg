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
        Schema::create('domo', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre', 50)->unique();
            $table->string('descripcion', 50);
            $table->integer('capacidad');
            $table->integer('numerobaños');
            $table->string('tipodomo');
            $table->integer('estado'); 
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
        Schema::dropIfExists('domo');
    }
};
