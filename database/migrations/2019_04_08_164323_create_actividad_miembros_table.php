<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_miembros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_actividad');
            $table->unsignedInteger('id_usuario');
            $table->timestamps();

            $table->index(['id_actividad', 'id_usuario']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_miembros');
    }
}
