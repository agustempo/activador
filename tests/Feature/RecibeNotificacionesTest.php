<?php

namespace Tests\Feature;

use App\Notifications\ActividadEliminada;
use App\Notifications\ActividadModificada;
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
    
    public function usuario_recibe_notificacion_al_inscribirse()
    {
        $this->withoutExceptionHandling();
    
        $actividad = factory('App\Actividad', 3)->create()->last();

        $usuario = factory('App\Usuario', 2)->create()->last();

        $this->actingAs($usuario)
            ->post(action('InscripcionesController@store',$actividad->id))
            ->assertRedirect();

        $this->assertCount(1,$usuario->notifications);
    }

    /** @test */
    
    public function usuario_recibe_notificacion_al_desinscribirse()
    {
        $this->withoutExceptionHandling();
    
        $actividad = factory('App\Actividad', 3)->create()->last();

        $usuario = factory('App\Usuario', 2)->create()->last();

        $inscripcion = $actividad->inscribir($usuario);

        $this->actingAs($usuario)
            ->delete(action('InscripcionesController@destroy', $inscripcion->id))
            ->assertRedirect();

        $this->assertCount(1,$usuario->notifications);
        $this->assertTrue("App\Notifications\DesinscripcionRealizada" == $usuario->notifications->last()->type);
        //dd($usuario->notifications);
    }

    /** @test */
    
    public function usuario_puede_ver_sus_notificaciones()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario',2)->create()->last();

        $usuario->notify(new InscripcionRealizada(factory('App\Inscripcion')->create()));
        $usuario->notify(new DesinscripcionRealizada(factory('App\Inscripcion')->create()));
        $usuario->notify(new ActividadModificada(factory('App\Inscripcion')->create()));
        $usuario->notify(new ActividadEliminada(factory('App\Inscripcion')->create()));

        //$this->get(action('HomeController@notificaciones'))->assertRedirect('login');

        $this->actingAs($usuario)
            ->get(action('HomeController@notificaciones'))
            ->assertOk();

        $this->assertCount(4,$usuario->notifications);
    }

    /** @test */
    
    public function inscriptos_se_notifican_si_la_actividad_se_modifica()
    {
        $this->withoutExceptionHandling();

        $actividad = factory('App\Actividad',2)->create()->last();

        $actividad->inscribir($miguel = factory('App\Usuario')->create());
        $actividad->inscribir($antonio = factory('App\Usuario')->create());

        $this->actingAs($actividad->creador)
            ->patch(action('admin\ActividadesController@update', $actividad->id), $actividad->toArray())
            ->assertRedirect();

        $this->assertCount(1,$miguel->notifications);
        $this->assertCount(1,$antonio->notifications);
    }

    /** @test */
    
    public function inscriptos_se_notifican_si_la_actividad_se_elimina()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad',2)->create()->last();

        $actividad->inscribir($miguel = factory('App\Usuario')->create());
        $actividad->inscribir($antonio = factory('App\Usuario')->create());

        $this->actingAs($actividad->creador)
            ->delete(action('admin\ActividadesController@destroy', $actividad->id))
            ->assertRedirect();

        $this->assertCount(1,$miguel->notifications);
        $this->assertCount(1,$antonio->notifications);
    }
}
