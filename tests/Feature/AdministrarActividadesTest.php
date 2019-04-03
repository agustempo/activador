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

    public function invitado_no_administra_actividades()
    {
        //$this->withoutExceptionHandling();

        $actividad = factory('App\Actividad')->create();

        $this->get('/admin/actividades',$actividad->toArray())->assertRedirect('/login');
        $this->get($actividad->path_admin(),$actividad->toArray())->assertRedirect('/login');
        $this->patch($actividad->path_admin(),$actividad->toArray())->assertRedirect('/login');
        $this->delete($actividad->path_admin(),$actividad->toArray())->assertRedirect('/login');
        $this->post('/admin/actividades',$actividad->toArray())->assertRedirect('/login');

    }

    /** @test **/

    public function usuario_crea_una_actividad()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\Usuario')->create());


        $this->post('/admin/actividades',factory('App\Actividad')->raw());

        //ENTONCES debería aparecer una nueva actividad en la base de datos
        $this->assertDatabaseHas('actividades',[]);
    }

    /** @test **/

    public function actividad_requiere_un_nombre()
    {
        //$this->withoutExceptionHandling();
        
        //DADO
        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->raw([
            'nombre' => '',
            'id_creador' => $usuario->id
        ]);

        //CUANDO        
        $response = $this->post('/admin/actividades',$actividad);

        //ENTONCES
        $response->assertSessionHasErrors('nombre');
    }

    /** @test **/

    public function actividad_requiere_una_descripcion()
    {
        //$this->withoutExceptionHandling();
        
        //DADO
        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->raw([
            'descripcion' => ''
        ]);

        //CUANDO        
        $response = $this->post('/admin/actividades',$actividad);

        //ENTONCES
        $response->assertSessionHasErrors('descripcion');
    }

    /** @test **/

    public function actividad_requiere_fechas()
    {
        //$this->withoutExceptionHandling();
        
        //DADO
        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad = factory('App\Actividad')->raw([
            'fecha_inicio' => '',
            'fecha_fin' => ''
        ]);

        //CUANDO        
        $response = $this->post('/admin/actividades',$actividad);

        //ENTONCES
        $response->assertSessionHasErrors(['fecha_inicio', 'fecha_fin']);
    }
    
    /** @test **/

    public function invitado_ve_actividades()
    {
        $this->withoutExceptionHandling();

        //DADO que existe una actividad
        factory('App\Actividad')->create([
            'nombre' => 'Prueba',
            'id_creador' => factory('App\Usuario')->create()

        ]);

        //CUANDO entro al endpoint /actividades la veo en el listado

        $response = $this->get('/actividades');

        //ENTONCES debería aparecer una nueva actividad en la base de datos
        $this->assertDatabaseHas('actividades',[ 'nombre' => 'Prueba' ]);

        //ENTONCES la vista recibe los datos
        $response->assertSeeText('Prueba');
    }

    /** @test **/

    public function usuario_ve_sus_actividades_creadas()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        //DADO que existe una actividad creada por usuario atenticado
        factory('App\Actividad')->create([
            'nombre' => 'Prueba es mía',
            'id_creador' => $usuario->id
        ]);
        // y una que no
        factory('App\Actividad')->create([
            'nombre' => 'Prueba no es mía'
        ]);

        //CUANDO veo mi listado de actividad ENTONCES deberían aparecer solo las mías

        $response = $this->get('/admin/actividades');

        //¡¡
        $response->assertSeeText('Prueba');
    }

    /** @test **/

    public function usuario_ve_proyectos_creados_por_el_solamente()
    {
        ///$this->withoutExceptionHandling();

        //DADO 
        
        $usuario = factory('App\Usuario')->create();
        $this->actingAs($usuario);

        $actividad_mia = factory('App\Actividad')->create([
            'id_creador' => $usuario->id
        ]);
        $actividad_de_otro = factory('App\Actividad')->create();

        //CUANDO y ENTONCES

        $response = $this->get($actividad_mia->path_admin())->assertStatus(200);

        $response = $this->get($actividad_de_otro->path_admin())->assertStatus(403);
    }

}
