<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VerActividadesTest extends DuskTestCase
{
    use DatabaseMigrations;

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
        $this->actividad_de_otro = factory('App\Actividad')->create();
        $this->actividad_soy_invitado = factory('App\Actividad')->create();
        $this->actividad_soy_invitado->invitar($this->actividad_mia->creador);
    }

    private function usuario_solo_puede_ver_actividades_creadas_por_el()
    {
        $this->dado_que_hay_actividades_creadas_por_mi_otras_donde_estoy_invitado_y_otras();

        $this->browse(function ($browser) {

            /*Cuando voy al listado de actividades creadas*/
            $browser
                ->loginAs($this->actividad_mia->creador)
                ->visit('/admin/actividades_creadas')
                /*Entonces debería ver solo las actividades creadas por el usuario*/
                ->assertSee($this->actividad_mia->nombre)
                ->assertDontSee($this->actividad_de_otro->nombre)
                ->assertDontSee($this->actividad_soy_invitado->nombre);
        });
    }
    
    private function usuario_solo_puede_ver_actividades_donde_es_invitado()
    {
        $this->dado_que_hay_actividades_creadas_por_mi_otras_donde_estoy_invitado_y_otras();

        $this->browse(function ($browser) {

            /*Cuando voy al listado de actividades como invitado*/
            $browser
                ->loginAs($this->actividad_mia->creador)
                ->visit('/admin/actividades_invitado')
                /*Entonces debería ver solo las actividades creadas por el usuario*/
                ->assertDontSee($this->actividad_mia->nombre)
                ->assertDontSee($this->actividad_de_otro->nombre)
                ->assertSee($this->actividad_soy_invitado->nombre);
        });
    }

    private function usuario_puede_ver_todas_las_actividades()
    {
        $this->dado_que_hay_actividades_creadas_por_mi_otras_donde_estoy_invitado_y_otras();

        $this->browse(function ($browser) {

            /*Cuando voy al listado de todas las actividades que pueda administrar*/
            $browser
                ->loginAs($this->actividad_mia->creador)
                ->visit('/admin/actividades')
                /*Entonces debería ver solo las actividades creadas por el usuario*/
                ->assertSee($this->actividad_mia->nombre)
                ->assertDontSee($this->actividad_de_otro->nombre)
                ->assertSee($this->actividad_soy_invitado->nombre);
        });
    }
}
