<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Actividad;
use App\Usuario;

class InscripcionTest extends TestCase
{
	use RefreshDatabase;

	/** @test **/

    public function tiene_actividad()
    {
    	$this->withoutExceptionHandling();

        $inscripcion = factory('App\Inscripcion')->create();

        $this->assertInstanceOf(Actividad::class, $inscripcion->actividad);

    }

    /** @test **/

    public function tiene_usuario()
    {
    	$this->withoutExceptionHandling();
    	
        $inscripcion = factory('App\Inscripcion')->create();

        $this->assertInstanceOf(Usuario::class, $inscripcion->usuario);

    }

}
