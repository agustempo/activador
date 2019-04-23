<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_actividad');
            $table->string('descripcion');
            $table->text('cambios')->nullable();

            //polimorfica
            $table->unsignedInteger('id_objeto')->nullable();
            $table->string('tipo_objeto')->nullable();

            $table->foreign('id_actividad')
                ->references('id')
                ->on('actividades')
                ->onDelete('cascade');

            $table->foreign('id_usuario')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');

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
        Schema::dropIfExists('auditorias');
    }
}
