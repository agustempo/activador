<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_actividad');
            $table->unsignedInteger('id_usuario');
            $table->boolean('confirma')->default(false);
            $table->boolean('presente')->default(false);

            $table->foreign('id_actividad')
                  ->references('id')
                  ->on('actividades');

            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios');

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
        Schema::dropIfExists('inscripciones');
    }
}
