<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_actividad');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('puntaje');
            $table->text('comentario')->nullable();

            $table->timestamps();

            $table->foreign('id_actividad')
              ->references('id')->on('actividades')
              ->onDelete('cascade');
              
            $table->foreign('id_usuario')
              ->references('id')->on('usuarios')
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
        Schema::dropIfExists('evaluaciones');
    }
}
