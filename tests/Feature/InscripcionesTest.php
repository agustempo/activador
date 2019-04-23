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
            ->post($actividad->path_admin() . "/inscripciones", [ 'id_usuario' => $usuario_a_inscribir->id ] )
            ->assertRedirect($actividad->path_admin() . "/inscripciones");

        $this->get($actividad->path_admin() . "/inscripciones")->assertSee($usuario_a_inscribir->nombre);

        $this->assertDatabaseHas('inscripciones', [ 'id_actividad' => $actividad->id ]);

    }


    /** @test **/

    public function solo_el_creador_puede_inscribir_un_usuario()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $this->actingAs(factory('App\Usuario')->create())
            ->post($actividad->path_admin() . "/inscripciones", [ 'email' => $usuario_a_inscribir->email ] )
            ->assertStatus(403);

        $this->assertDatabaseMissing('inscripciones', [ 'id_actividad', $actividad->id ]);

    }

    /** @test **/

    public function el_creador_puede_desinscribir_un_usuario()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $usuario_a_inscribir = factory('App\Usuario')->create();

        $inscripcion = factory('App\Inscripcion')->create([
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id
        ]);

        $this->actingAs($actividad->creador)
            ->delete($inscripcion->path_admin())
            ->assertRedirect($actividad->path_admin() . '/inscripciones');

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

        $this->patch($inscripcion->path_admin(), [ 'confirma' => true, 'presente' => true ])
            ->assertRedirect($actividad->path_admin() . '/inscripciones');

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirma' => true,
            'presente' => true
        ]);

        $this->patch($inscripcion->path_admin(), [ 'confirma' => false, 'presente' => false ])
            ->assertRedirect($actividad->path_admin() . '/inscripciones');

        $this->assertDatabaseHas('inscripciones', [ 
            'id_actividad' => $actividad->id,
            'id_usuario' => $usuario_a_inscribir->id,
            'confirma' => false,
            'presente' => false
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
            'confirma' => true
        ]);

    }

    /** @test **/

    public function solo_usuario_puede_ver_inscripciones_de_una_actividad()
    {
        ///$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $actividad->inscribir($usuario = factory('App\Usuario')->create());

        $this->actingAs($usuario)
            ->get($actividad->path_admin() . "/inscripciones")
            ->assertForbidden();

        $this->actingAs($actividad->creador)
            ->get($actividad->path_admin() . "/inscripciones")
            ->assertSee($usuario->nombre);
    }

    /** @test */
    public function el_usuario_inscripto_debe_existir_en_el_sistema()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $u = factory('App\Usuario')->create();
        $u->delete();

        $session = $this->actingAs($a->creador)
            ->post($a->path_admin().'/inscripciones', [ 'id_usuario' => $u->id ])
            ->assertSessionHasErrors();

    }

    /** @test */
    public function un_usuario_no_se_puede_inscribir_mas_de_una_vez()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $u = factory('App\Usuario')->create();

        $a->inscribir($u);

        $this->actingAs($a->creador)->post($a->path_admin().'/inscripciones',[
            'id_usuario' => $u->id
        ])->assertSessionHasErrors();

    }

}
