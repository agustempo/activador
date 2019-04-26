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

            $table->foreign('id_actividad')
                  ->references('id')
                  ->on('actividades')
                  ->onDelete('cascade');

            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
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
