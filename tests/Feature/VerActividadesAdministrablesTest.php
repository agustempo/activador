<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VerActividadesAdministrablesTest extends TestCase
{
    use RefreshDatabase;
    
    /*
    Feature: Ver actividades administrables
    Para poder administrar actividades creadas en el sistema (WHY)
    Los usuarios autentificados (WHO)
    Poder ver un listado de actividades administrables (WHAT)
    */

    /** @test */
    
    public function ver_actividades_administrables()
    {
        //$this->withoutExceptionHandling();

        $this->dado_que_hay_actividades_creadas_por_mi_otras_donde_estoy_invitado_y_otras();
    
        $this->usuario_solo_puede_ver_actividades_donde_es_invitado();
        $this->usuario_solo_puede_ver_actividades_creadas_por_el();
        $this->usuario_puede_ver_todas_las_actividades();

    }
    
    private function dado_que_hay_actividades_creadas_por_mi_otras_donde_estoy_invitado_y_otras()
    {
        $this->actividad_mia = factory('App\Actividad')->create();
        $this->actividad_soy_invitado = factory('App\Actividad')->create();
        $this->actividad_soy_invitado->invitar($this->actividad_mia->creador);
    }
    
    private function usuario_solo_puede_ver_actividades_donde_es_invitado()
    {
        $this->actingAs($this->actividad_mia->creador)
            /*Cuando voy al listado de actividades en las que estoy invitado*/
            ->get('/admin/actividades_invitado')
            /*Entonces debería ver solo las actividades a las que estoy invitado*/
            ->assertDontSee($this->actividad_mia->nombre)
            ->assertSee($this->actividad_soy_invitado->nombre);
    }
    
    private function usuario_solo_puede_ver_actividades_creadas_por_el()
    {
        $this->actingAs($this->actividad_mia->creador)
            /*Cuando voy al listado de actividades en las que estoy invitado*/
            ->get('/admin/actividades_creadas')
            /*Entonces debería ver solo las actividades a las que estoy invitado*/
            ->assertSee($this->actividad_mia->nombre)
            ->assertDontSee($this->actividad_soy_invitado->nombre);
    }
    
    private function usuario_puede_ver_todas_las_actividades()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->actividad_mia->creador)
            /*Cuando voy al listado de actividades en las que estoy invitado*/
            ->get('/admin/actividades')
            /*Entonces debería ver las actividades que creé Y a las que estoy invitado*/
            ->assertSee($this->actividad_mia->nombre)
            ->assertSee($this->actividad_soy_invitado->nombre);
    }
}
