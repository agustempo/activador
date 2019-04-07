<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuditoriasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function crear_una_actividad_genera_un_registro()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $this->assertCount(1, $actividad->auditoria);
    }

    /** @test */
    public function modificar_una_actividad_genera_un_registro()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->update(['descripcion' => 'Editada']);

        $this->assertCount(2, $actividad->auditoria);

        $this->assertEquals('editada', $actividad->auditoria->last()->descripcion);
    }

    /** @test */

    public function inscribir_un_usuario_genera_un_registro()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario = factory('App\Usuario')->create();

        $actividad->inscribir($usuario);

        $this->assertCount(2, $actividad->auditoria);

        $this->assertEquals('Usuario inscripto', $actividad->auditoria->last()->descripcion);
    }
}
