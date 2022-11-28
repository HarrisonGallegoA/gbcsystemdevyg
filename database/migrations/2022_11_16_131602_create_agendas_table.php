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
            Schema::create('agendas', function (Blueprint $table) {
                $table->increments('id');
                $table->date('fechainicio');
                $table->date('fechafinal');
                $table->time('horainicio');
                $table->time('horafinal');

                $table->unsignedInteger('idDomo');
                $table->timestamps();
                $table->foreign('idDomo')->references("id")->on("domo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};
