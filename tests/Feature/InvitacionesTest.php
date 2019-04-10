<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitacionesTest extends TestCase
{
    use RefreshDatabase;

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
    public function la_direccion_de_email_invitada_debe_tener_una_cuenta_en_el_sistema()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $session = $this->actingAs($a->creador)->post($a->path_admin().'/invitaciones',[
            'email' => 'noexisto@mail.com'
        ]);

        $session->assertSessionHasErrors(['email' => 'La dirección de email debe estar asociada a una cuenta en el sistema.']);

    }

    /** @test */
    public function creador_de_una_actividad_puede_invitar_usuarios()
    {
        $this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $maria = factory('App\Usuario')->create();

        $this->actingAs($a->creador)
            ->post($a->path_admin().'/invitaciones', [ 'email' => $maria->email ])
            ->assertRedirect($a->path_admin());

        $this->assertTrue($a->miembros->contains($maria));

    }

    /** @test */
    public function usuario_miembro_puede_editar_una_actividad()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $a->invitar($usuario_a_invitar = factory('App\Usuario')->create());

        $this->actingAs($usuario_a_invitar)
            ->post(action('admin\InscripcionesController@store', [ 'actividad' => $a, 'usuario' => $usuario_a_invitar] ))
            ->assertRedirect($a->path_admin());

        $this->assertDatabaseHas('inscripciones',[ 'id_actividad' => $a->id, 'id_usuario' => $usuario_a_invitar->id ]);

    }
    
}
