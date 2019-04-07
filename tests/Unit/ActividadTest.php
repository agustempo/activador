<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActividadTest extends TestCase
{
	use RefreshDatabase;

    /** @test **/

    public function tiene_creador()
    {

        $actividad = factory('App\Actividad')->create();

        $this->assertInstanceOf('App\Usuario', $actividad->creador);
    }

    /** @test **/

    public function puede_inscribir_a_un_usuario()
    {

        $actividad = factory('App\Actividad')->create();
        $usuario = factory('App\Usuario')->create();

        $inscripcion = $actividad->inscribir($usuario);

        $this->assertCount(1, $actividad->inscriptos);
        $this->assertTrue($actividad->inscriptos->contains($inscripcion));
    }
}
