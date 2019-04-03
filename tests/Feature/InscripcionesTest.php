<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InscripcionesTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/

    public function una_actividad_puede_tener_inscriptos()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create([ 'id_creador' => $usuario->id ] );

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $this->post($actividad->path_admin() . "/inscripcion", [ 'id_usuario' => $usuario_a_inscribir->id ])
            ->assertRedirect($actividad->path_admin());

        $this->get($actividad->path_admin())->assertSee($usuario_a_inscribir->nombre);

        //$this->assertDatabaseHas('insripciones', [ 'id_actividad', $actividad->id ]);

    }

    /** @test **/

    public function una_inscripcion_requiere_un_id_de_usuario()
    {
        //$this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create([ 'id_creador' => $usuario->id ] );

        $this->post($actividad->path_admin() . "/inscripcion", [ 'id_usuario' => '' ])
            ->assertSessionHasErrors('id_usuario');

        //$this->get($actividad->path_admin())->assertSee($usuario_a_inscribir->nombre);

        //$this->assertDatabaseHas('insripciones', [ 'id_actividad', $actividad->id ]);

    }

    /** @test **/

    public function solo_el_creador_puede_inscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $this->post($actividad->path_admin() . "/inscripcion", [ 'id_usuario' => $usuario_a_inscribir->id ])
            ->assertStatus(403);

        $this->assertDatabaseMissing('inscripciones', [ 'id_actividad', $actividad->id ]);

    }

    /** @test **/

    public function el_creador_puede_desinscribir_un_usuario()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create([ 'id_creador' => $usuario->id ]);

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->delete($actividad->path_admin() . "/inscripcion/" . $inscripcion->id)
            ->assertRedirect($actividad->path_admin());
            //->assertStatus(403);

        $this->assertDatabaseMissing('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

    }

    /** @test **/

    public function solo_el_creador_puede_desinscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->delete($actividad->path_admin() . "/inscripcion/" . $inscripcion->id)
            ->assertStatus(403);

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

    }

    /** @test **/

    public function el_creador_puede_editar_una_inscripcion()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create([ 'id_creador' => $usuario->id ]);

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->patch($actividad->path_admin() . "/inscripcion/" . $inscripcion->id, [ 'confirmar' => true ])
            ->assertRedirect($actividad->path_admin());
            //->assertStatus(403);

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirmada' => true
        ]);

        $this->patch($actividad->path_admin() . "/inscripcion/" . $inscripcion->id, [ 'confirmar' => false ])
            ->assertRedirect($actividad->path_admin());

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirmada' => false
        ]);

    }

    public function solo_el_creador_puede_editar_una_inscripcion()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->patch($actividad->path_admin() . "/inscripcion/" . $inscripcion->id, [ 'confirmar' => true ])
            ->assertStatus(403);

        $this->assertDatabaseMissing('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirmada' => true
        ]);

    }



}
