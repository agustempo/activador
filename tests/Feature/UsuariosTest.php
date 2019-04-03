<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuariosTest extends TestCase
{

    use RefreshDatabase;

    /** @test **/

    public function invitado_puede_registrarse()
    {
        $this->withoutExceptionHandling();

        $usuario = factory('App\Usuario')->raw([ 'email' => 'prueba@prueba.com' ]);

        $usuario['password_confirmation'] = $usuario['password'];

        $this->post('/register', $usuario);

        $this->assertDatabaseHas('usuarios', [ 'email' => 'prueba@prueba.com' ]);

        $this->post('/logout');

        $response = $this->post('/login', [
            'email' => $usuario['email'],
            'password' => $usuario['password']
        ]);

        $response->assertRedirect('/home');
    }


}
