<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class AdministrarActividadesTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/

    public function usuario_puede_crear_actividad()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->make();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad_mia = factory('App\Actividad')->make([
            'id_creador' => $usuario->id
        ]);

        $this->post('/admin/actividades', $actividad_mia->toArray())
            ->assertRedirect('/admin/actividades');
        
        $this->assertDatabaseHas('actividades', ['id_creador' => $usuario->id]);
    }

    /** @test **/

    public function un_usuario_no_puede_crear_una_actividad_sin_datos_necesarios()
    {
        //$this->withoutExceptionHandling();
        
        $usuario = factory('App\Usuario')->create();

        $actividad = factory('App\Actividad')->raw([
            'id_creador' => $usuario->id,
            'nombre' => '',
            'descripcion' => '',
            'inicio' => '',
            'fin' => ''
        ]);

        $this->actingAs($usuario)
            ->post('/admin/actividades',$actividad)
            ->assertSessionHasErrors('nombre')
            ->assertSessionHasErrors('descripcion')
            ->assertSessionHasErrors('inicio')
            ->assertSessionHasErrors('fin');

        /*caso formato fecha*/
        $actividad = factory('App\Actividad')->raw([
            'inicio' => '2013-12-26T16:34',
            'fin' => '2013-12-26T16:34'
        ]);

        $this->actingAs($usuario)
            ->post('/admin/actividades',$actividad)
            ->assertRedirect();
    }

    /** @test **/

    public function usuario_puede_editar_actividad()
    {
        //$this->withoutExceptionHandling();
        
        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad_mia = factory('App\Actividad')->create([
            'id_creador' => $usuario->id
        ]);
        $actividad_de_otro = factory('App\Actividad')->create();

        $actividad_mia->descripcion = 'Modificada';
        $actividad_de_otro->descripcion = 'Modificada';

        $this->patch($actividad_mia->path_admin(),$actividad_mia->toArray())
            ->assertRedirect($actividad_mia->path_admin());

        $this->assertDatabaseHas('actividades',$actividad_mia->toArray());

    }

    /** @test **/

    public function un_usuario_no_puede_editar_una_actividad_sin_datos_necesarios()
    {
        //$this->withoutExceptionHandling();
        
        $actividad = factory('App\Actividad')->create();

        $cambios = factory('App\Actividad')->raw([
            'nombre' => '',
            'descripcion' => '',
            'inicio' => '',
            'fin' => ''
        ]);

        $this->actingAs($actividad->creador)
            ->patch($actividad->path_admin(), $cambios)
            ->assertSessionHasErrors(['nombre', 'descripcion', 'inicio', 'fin']);

        /*caso formato fecha*/
        $cambios = factory('App\Actividad')->raw([
            'inicio' => '2013-12-26T16:34',
            'fin' => '2013-12-26T16:34'
        ]);

        $this->patch($actividad->path_admin(),$cambios)
            ->assertRedirect();
    }

    /** @test **/

    public function invitado_no_administra_actividades()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $this->get('/admin/actividades',$actividad->toArray())
            ->assertRedirect('/login');

        $this->get($actividad->path_admin(),$actividad->toArray())
        ->assertRedirect('/login');

        $this->patch($actividad->path_admin(),$actividad->toArray())
            ->assertRedirect('/login');

        $this->delete($actividad->path_admin(),$actividad->toArray())
            ->assertRedirect('/login');

        $this->post('/admin/actividades',$actividad->toArray())
            ->assertRedirect('/login');

    }

}
