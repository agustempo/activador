<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitacionesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creador_de_una_actividad_puede_invitar_usuarios()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $maria = factory('App\Usuario')->create();

        $this->actingAs($a->creador)
            ->post($a->path_admin() . '/invitaciones', [ 'id_usuario' => $maria->id ])
            ->assertRedirect($a->path_admin() . '/invitaciones');

        $this->assertTrue($a->miembros->contains($maria));

    }

    /** @test */
    public function solo_el_creador_puede_invitar_usuarios()
    {
        //$this->withoutExceptionHandling();


        $this->actingAs($u = factory('App\Usuario')->create())
            ->post(factory('App\Actividad')->create()->path_admin().'/invitaciones')
            ->assertStatus(403);

        //$this->assertDatabaseMissing('activdad_miembros', []);

    }

    /** @test */
    public function el_usuario_debe_existir_en_el_sistema()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $session = $this->actingAs($a->creador)->post($a->path_admin() . '/invitaciones', [
            'id_usuario' => -2
        ]);

        $session->assertSessionHasErrors('id_usuario');

    }

    /** @test */
    public function usuario_miembro_puede_editar_una_actividad()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $a->invitar($usuario_a_invitar = factory('App\Usuario')->create());

        $this->actingAs($usuario_a_invitar)
            ->post(action('admin\InscripcionesController@store', [ 'actividad' => $a ]), [ 'id_usuario' => $usuario_a_invitar->id ] )
            ->assertRedirect($a->path_admin() . '/inscripciones');

        $this->assertDatabaseHas('inscripciones',[ 'id_actividad' => $a->id, 'id_usuario' => $usuario_a_invitar->id ]);

    }

    /** @test */
    public function creador_puede_ver_invitaciones_de_una_actividad()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $a->invitar($usuario_a_invitar = factory('App\Usuario')->create());

        $this->actingAs($usuario_a_invitar)
            ->get(action('admin\ActividadInvitacionesController@show', [ 'actividad' => $a ]))
            ->assertSee($usuario_a_invitar->nombre);

    }

    /** @test */
    public function no_se_puede_invitar_a_un_usuario_mas_de_una_vez()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $maria = factory('App\Usuario')->create();

        $this->actingAs($a->creador)
            ->post($a->path_admin() . '/invitaciones', [ 'id_usuario' => $maria->id ])
            ->assertRedirect($a->path_admin() . '/invitaciones');

        $this->actingAs($a->creador)
            ->post($a->path_admin() . '/invitaciones', [ 'id_usuario' => $maria->id ])
            ->assertSessionHasErrors();

    }
    
}
