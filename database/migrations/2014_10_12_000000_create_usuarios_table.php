<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->string('carrera')->nullable();
            $table->string('universidad')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('rol_trabajo')->nullable();
            $table->string('trayectoria')->nullable();
            $table->string('intereses')->nullable();
            $table->string('cohorte')->nullable();
            $table->string('región')->nullable();
            $table->string('programa')->nullable();
            $table->string('rol');
            $table->text('reseña')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('cv')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
