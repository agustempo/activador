<?php

namespace Tests\Feature;

use App\Auditoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneraAuditoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function crear_una_actividad()
    {
        $this->withoutExceptionHandling();
        factory('App\Usuario')->create();
        $actividad = factory('App\Actividad')->create();
        
        $this->assertCount(1, $actividad->auditoria);
        $this->assertNull($actividad->auditoria->last()->objeto);
        $this->assertTrue($actividad->creador->is($actividad->auditoria->last()->usuario));
    }

    /** @test */
    public function modificar_una_actividad()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->update(['descripcion' => 'Editada']);

        $this->assertCount(2, $actividad->auditoria);
        $this->assertNull($actividad->auditoria->last()->objeto);
    }

    /** @test */

    public function inscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario = factory('App\Usuario')->create();

        $i = $actividad->inscribir($usuario);

        $this->assertCount(2, $actividad->auditoria);
        $this->assertInstanceOf('App\Inscripcion', $actividad->auditoria->last()->objeto);
    }

    /** @test */

    public function eliminar_una_inscripcion()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario = factory('App\Usuario')->create();

        $i = $actividad->inscribir($usuario);
        $actividad->desinscribir($usuario);

        $this->assertCount(3, $actividad->auditoria);
        $this->assertNull($actividad->auditoria->last()->objeto);
    }

    /** @test */

    public function editar_una_inscripcion()
    {
        $this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $u = factory('App\Usuario')->create();

        $i = $a->inscribir($u);

        $this->actingAs($a->creador)
            ->patch(action('admin\InscripcionesController@update',[ 'id_inscripcion' => $i ]), [ 'confirma' => true ])
            ->assertRedirect($a->path_admin() . '/inscripciones');

        $this->assertCount(3, $a->auditoria);
        $this->assertInstanceOf('App\Inscripcion', $a->auditoria->last()->objeto);
    }

    /** @test */

    public function editar_una_actividad_antes_y_despues()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();
        $nombre_original = $actividad->nombre;

        $actividad->update([ 'nombre' => 'editada' ]);

        $registro_auditoria = $actividad->auditoria->last();

        $this->assertEquals($registro_auditoria->cambios
        , [
            'antes' => [ 'nombre' => $nombre_original ],
            'despues' => [ 'nombre' => 'editada' ]
        ]);

    }

    /** @test */

    public function crear_una_actividad_antes_y_despues()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $this->assertNull($actividad->auditoria->last()->cambios);

    }

    /** @test */

    public function inscribir_un_usuario_antes_y_despues()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir(factory('App\Usuario')->create());

        $this->assertNull($actividad->auditoria->last()->cambios);

    }

    /** @test */

    public function confirmar_un_usuario_antes_y_despues()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $inscripcion = $actividad->inscribir(factory('App\Usuario')->create());

        $inscripcion->update([ 'confirma' => true ]);

        $registro_auditoria = $actividad->auditoria->last();

        $this->assertEquals($registro_auditoria->cambios
        , [
            'antes' => [ 'confirma' => false ],
            'despues' => [ 'confirma' => true ]
        ]);

    }

    /** @test */

    public function desinscribir_y_volver_a_inscribir_un_usuario()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario = factory('App\Usuario')->create();

        $i = $actividad->inscribir($usuario);
        $actividad->desinscribir($usuario);
        $actividad->inscribir($usuario);

        $this->assertCount(4, $actividad->auditoria);
        $this->assertInstanceOf('App\Inscripcion', $actividad->auditoria->last()->objeto);
    }

}
