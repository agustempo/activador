<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuditoriaTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function tiene_un_usuario()
    {
    	$this->withoutExceptionHandling();

    	$actividad = factory('App\Actividad')->create();
    	$this->assertInstanceOf('App\Usuario', $actividad->auditoria->first()->usuario);
    	$this->assertTrue($actividad->auditoria->first()->usuario->is($actividad->creador));

    	$this->actingAs($usuario = factory('App\Usuario')->create());
    	$actividad = factory('App\Actividad')->create();
    	$this->assertTrue($actividad->auditoria->first()->usuario->is($usuario));
    }
}
