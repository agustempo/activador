<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            
            $table->increments('id');

            //básicos
            $table->string('nombre', 255);
            $table->text('descripcion')->nullable();

            //fechas
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->string('lugar', 255)->nullable();

            $table->unsignedInteger('id_creador');

            //$table->string('lugar', 300);
            //$table->boolean('estado')->default(true);
            //$table->boolean('visibilidad')->default(true);
            //$table->unsignedInteger('id_tipo')->nullable();



            //$table->dateTime('fechaInicioInscripciones')->nullable();
            //$table->dateTime('fechaFinInscripciones')->nullable();

            //$table->dateTime('fechaInicioEvaluaciones')->nullable();
            //$table->dateTime('fechaFinEvaluaciones')->nullable();

            //$table->unsignedInteger('limite_inscripciones')->default(0);
            //$table->text('mensaje_inscripciones', 65535)->nullable();

            //auditoria
            //$table->integer('id_usuario_creacion')->nullable();
            //$table->integer('id_usuario_modificacion')->nullable();

            $table->foreign('id_creador')
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
        Schema::dropIfExists('actividades');
    }
}
