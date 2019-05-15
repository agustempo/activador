<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VerAuditoriasTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test **/

    public function usuario_puede_ver_auditorias()
    {
        //$this->withoutExceptionHandling();

        $a = factory('App\Actividad')->create();

        $this->actingAs($a->creador)
            ->get(action('admin\ActividadesController@auditorias', $a))
            ->assertOk();

        $u = factory('App\Usuario')->create();
        $a->inscribir($u);
        $a->invitar($u);

        $this->get(action('admin\ActividadesController@auditorias', $a))
            ->assertOk();

    }
}
