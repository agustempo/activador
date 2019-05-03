<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EvaluarActividadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_inscripto_puede()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($usuario = factory('App\Usuario')->create());

        $evaluacion = factory('App\Evaluacion')->raw();

        $this->actingAs($usuario)
            ->post(action('EvaluacionesController@store', $actividad), $evaluacion)
            ->assertRedirect();

        $this->assertDatabaseHas('evaluaciones', $evaluacion);

    }

    /** @test */
    public function solo_un_inscripto_puede()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario = factory('App\Usuario')->create();

        $evaluacion = factory('App\Evaluacion')->raw();

        $this->actingAs($usuario)
            ->post(action('EvaluacionesController@store', $actividad), $evaluacion)
            ->assertSessionHasErrors();

        $this->assertDatabaseMissing('evaluaciones', $evaluacion);

    }

    /** @test */
    public function un_inscripto_no_puede_evaluar_mas_de_una_vez()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($usuario = factory('App\Usuario')->create());

        $evaluacion = factory('App\Evaluacion')->raw();

        $this->actingAs($usuario)
            ->post(action('EvaluacionesController@store', $actividad), $evaluacion)
            ->assertRedirect();

        $this->actingAs($usuario)
            ->post(action('EvaluacionesController@store', $actividad), $evaluacion)
            ->assertSessionHasErrors();

        $this->assertCount(1, $usuario->evaluaciones);

    }

    /** @test */
    
    public function evaluacion_requiere_puntaje()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($usuario = factory('App\Usuario')->create());

        $evaluacion = factory('App\Evaluacion')->raw([ 'puntaje' => '' ]);

        $this->actingAs($usuario)
            ->post(action('EvaluacionesController@store', $actividad), $evaluacion)
            ->assertSessionHasErrors();

        $this->assertDatabaseMissing('evaluaciones', $evaluacion);
    }

    /** @test */
    public function inscripto_no_puede_ver_evaluaciones_de_otros()
    {
        //$this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($mike = factory('App\Usuario')->create());
        $actividad->inscribir($pit = factory('App\Usuario')->create());

        $actividad->evaluaciones()
            ->saveMany([
                factory('App\Evaluacion')->make([ 'comentario' => 'Soy mike', 'id_usuario' => $mike->id ]),
                factory('App\Evaluacion')->make([ 'comentario' => 'Soy pit', 'id_usuario' => $pit->id ])
            ]);

        $this->actingAs($pit)
            ->get(action('EvaluacionesController@index'))
            ->assertOk()
            ->assertSee('pit')
            ->assertDontSee('mike');

    }

    /** @test */
    public function inscripto_no_puede_ver_evaluaciones_de_otros_en_actividad()
    {
        $this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($mike = factory('App\Usuario')->create());
        $actividad->inscribir($pit = factory('App\Usuario')->create());

        $actividad->evaluaciones()
            ->saveMany([
                factory('App\Evaluacion')->make([ 'comentario' => 'Soy mike', 'id_usuario' => $mike->id ]),
                factory('App\Evaluacion')->make([ 'comentario' => 'Soy pit', 'id_usuario' => $pit->id ])
            ]);

        $this->actingAs($pit)
            ->get(action('EvaluacionesController@show', $actividad))
            ->assertOk()
            ->assertSee('pit')
            ->assertDontSee('mike');

    }

    /** @test */
    public function evaluador_puede_editar_su_evaluacion()
    {
        $this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($usuario = factory('App\Usuario')->create());

        $evaluacion = factory('App\Evaluacion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario->id
        ]);

        $evaluacion_modificada = factory('App\Evaluacion')->raw();

        $this->actingAs($usuario)
            ->patch(action('EvaluacionesController@update', [$actividad, $evaluacion]), $evaluacion_modificada)
            ->assertRedirect();

        $this->assertDatabaseHas('evaluaciones', $evaluacion_modificada);
    }

    /** @test */
    public function evaluador_no_puede_editar_evaluaciones_de_otros()
    {
        //$this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $tim = factory('App\Usuario')->create();
        $mat = factory('App\Usuario')->create();

        $actividad->inscribir($tim);

        $evaluacion = factory('App\Evaluacion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $tim->id
        ]);

        $evaluacion_modificada = factory('App\Evaluacion')->raw();

        $this->actingAs($mat)
            ->patch(action('EvaluacionesController@update', [$actividad, $evaluacion] ), $evaluacion_modificada)
            ->assertForbidden();

        $this->assertDatabaseMissing('evaluaciones', $evaluacion_modificada);
    }

    /** @test */
    public function evaluador_puede_eliminar_su_evaluacion()
    {
        $this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($usuario = factory('App\Usuario')->create());

        $evaluacion = factory('App\Evaluacion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario->id
        ]);

        $this->actingAs($usuario)
            ->delete(action('EvaluacionesController@destroy', [$actividad, $evaluacion] ))
            ->assertRedirect();

        $this->assertDatabaseMissing('evaluaciones', $evaluacion->toArray());
    }

    /** @test */
    public function evaluador_no_puede_eliminar_evaluaciones_de_otros()
    {
        //$this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $tim = factory('App\Usuario')->create();
        $mat = factory('App\Usuario')->create();

        $actividad->inscribir($tim);
        $actividad->inscribir($mat);

        $evaluacion = factory('App\Evaluacion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $tim->id
        ]);

        $this->actingAs($mat)
            ->delete(action('EvaluacionesController@destroy', [$actividad, $evaluacion] ))
            ->assertForbidden();

        $this->assertDatabaseHas('evaluaciones', $evaluacion->toArray());
    }

    /** @test */
    
    public function creador_de_actividad_puede_listar_todas_las_evaluaciones()
    {
        $this->withoutExceptionHandling();
        $actividad = factory('App\Actividad')->create();

        $tim = factory('App\Usuario')->create();
        $mat = factory('App\Usuario')->create();

        $evaluacion_tim = factory('App\Evaluacion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $tim->id
        ]);

        $evaluacion_mat = factory('App\Evaluacion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $mat->id
        ]);

        $this->actingAs($actividad->creador)
            ->get(action('admin\EvaluacionesController@show', $actividad))
            ->assertSee($evaluacion_tim->comentario)
            ->assertSee($evaluacion_mat->comentario);
    }
}
