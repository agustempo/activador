<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class UsuarioTest extends TestCase
{
	use RefreshDatabase;

	/** @test **/

    public function tiene_actividades()
    {
        $usuario = factory('App\Usuario')->create();

        $actividad = factory('App\Actividad')->create([ 'id_creador' => $usuario->id ]);

        $actividades_creadas = $usuario->actividades_creadas;

        $this->assertInstanceOf(Collection::class, $usuario->actividades_creadas);

        $this->assertTrue($actividades_creadas->contains('id_creador', $usuario->id));

    }
}
