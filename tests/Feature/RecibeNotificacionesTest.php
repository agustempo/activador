<?php

namespace Tests\Feature;

use App\Notifications\DesinscripcionRealizada;
use App\Notifications\InscripcionRealizada;
use App\Notifications\UsuarioInscripto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RecibeNotificacionesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    
    public function un_usuario_publico_recibe_notificacion_al_inscribirse()
    {
        $this->withoutExceptionHandling();

        Notification::fake();
    
        $actividad = factory('App\Actividad', 3)->create()->last();

        $usuario = factory('App\Usuario', 2)->create()->last();

        $this->actingAs($usuario)
            ->post(action('InscripcionesController@store',$actividad->id))
            ->assertRedirect();

        Notification::assertSentTo(
            [$usuario], 
            InscripcionRealizada::class,
            function ($notification) use ($actividad) {
                return $notification->data === $actividad->nombre;
            }
        );
    }

    /** @test */
    
    public function creador_recibe_notificacion_cuando_usuario_se_inscribe()
    {
        $this->withoutExceptionHandling();

        Notification::fake();
    
        $actividad = factory('App\Actividad', 3)->create()->last();

        $usuario = factory('App\Usuario', 2)->create()->last();

        $this->actingAs($usuario)
            ->post(action('InscripcionesController@store',$actividad->id))
            ->assertRedirect();

        Notification::assertSentTo(
            [$actividad->creador], UsuarioInscripto::class
        );
    }

    /** @test */
    
    public function un_usuario_publico_recibe_notificacion_al_desinscribirse()
    {
        //$this->withoutExceptionHandling();

        Notification::fake();
    
        $actividad = factory('App\Actividad', 3)->create()->last();

        $usuario = factory('App\Usuario', 2)->create()->last();

        $inscripcion = $actividad->inscribir($usuario);

        $this->actingAs($usuario)
            ->delete(action('InscripcionesController@destroy', $inscripcion->id))
            ->assertRedirect();

        Notification::assertSentTo(
            [$usuario], DesinscripcionRealizada::class
        );
    }

    /** @test */
    
    public function usuario_puede_ver_sus_notificaciones()
    {
        //$this->withoutExceptionHandling();

        Notification::fake();

        $usuario = factory('App\Usuario',2)->create()->last();

        $usuario->notify(new InscripcionRealizada(factory('App\Inscripcion')->create()));

        $this->get(action('HomeController@notificaciones'))
            ->assertRedirect('login');

        $this->actingAs($usuario)
            ->get(action('HomeController@notificaciones'))
            ->assertOk();

        Notification::assertSentTo(
            [$usuario], InscripcionRealizada::class
        );
    }
}
