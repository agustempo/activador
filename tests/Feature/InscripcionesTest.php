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

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $this->actingAs($actividad->creador)
            ->post($actividad->path_admin() . "/inscripcion/" . $usuario_a_inscribir->id )
            ->assertRedirect($actividad->path_admin());

        $this->get($actividad->path_admin())->assertSee($usuario_a_inscribir->nombre);

        $this->assertDatabaseHas('inscripciones', [ 'id_actividad' => $actividad->id ]);

    }

    /** @test **/

    public function una_inscripcion_requiere_un_id_de_usuario()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $this->actingAs($actividad->creador)
            ->post($actividad->path_admin() . "/inscripcion/")
            ->assertNotFound();

    }

    /** @test **/

    public function solo_el_creador_puede_inscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $this->actingAs(factory('App\Usuario')->create())
            ->post($actividad->path_admin() . "/inscripcion/" . $usuario_a_inscribir->id )
            ->assertStatus(403);

        $this->assertDatabaseMissing('inscripciones', [ 'id_actividad', $actividad->id ]);

    }

    /** @test **/

    public function el_creador_puede_desinscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->actingAs($actividad->creador)
            ->delete($inscripcion->path_admin())
            ->assertRedirect($actividad->path_admin());

        $this->assertDatabaseMissing('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

    }

    /** @test **/

    public function solo_el_creador_puede_desinscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->actingAs(factory('App\Usuario')->create())
            ->delete($inscripcion->path_admin())
            ->assertStatus(403);

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

    }

    /** @test **/

    public function el_creador_puede_editar_una_inscripcion()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->actingAs($actividad->creador);

        $this->patch($inscripcion->path_admin(), [ 'confirmar' => true ])
            ->assertRedirect($actividad->path_admin());
            //->assertStatus(403);

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirmada' => true
        ]);

        $this->patch($inscripcion->path_admin(), [ 'confirmar' => false ])
            ->assertRedirect($actividad->path_admin());

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirmada' => false
        ]);

    }

    public function solo_el_creador_puede_editar_una_inscripcion()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->actingAs(factory('App\Usuario')->create())
            ->patch($inscripcion->path_admin(), [ 'confirmar' => true ])
            ->assertStatus(403);

        $this->assertDatabaseMissing('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirmada' => true
        ]);

    }

}
