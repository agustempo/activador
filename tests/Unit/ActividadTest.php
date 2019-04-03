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
    	//DADO
        $actividad = factory('App\Actividad')->create();

        //CUANDO ENTONCES
        $this->assertInstanceOf('App\Usuario', $actividad->creador);
    }

    /** @test **/

    public function puede_inscribir_a_un_usuario()
    {
    	//DADO
        $actividad = factory('App\Actividad')->create();
        $usuario = factory('App\Usuario')->create();

        $inscripcion = $actividad->inscribir($usuario->id);

        //CUANDO ENTONCES
        $this->assertCount(1, $actividad->inscriptos);
        $this->assertTrue($actividad->inscriptos->contains($inscripcion));
    }
}
