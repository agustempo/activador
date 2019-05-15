<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocalizacionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    
    public function el_sitio_cambia_segun_idioma_elegido()
    {
        //$this->withoutExceptionHandling();

        \Lang::setFallback('pt');

        \Lang::addLines(['prueba.prueba_idioma' => 'proba'],'pt');
        \Lang::addLines(['prueba.prueba_idioma' => 'test'],'en');
    
        $this->get('/idioma/en')->assertRedirect();
        $this->get('/idioma/prueba')->assertSee('test');

        $this->get('/idioma/pt')->assertRedirect();
        $this->get('/idioma/prueba')->assertSee('proba');

        $this->get('/idioma/jp')->assertRedirect();
        $this->get('/idioma/prueba')->assertSee('proba');
    }

    /** @test */
    
    public function se_muestran_las_opciones_en_el_menu()
    {
        $this->withoutExceptionHandling();
        config([ 'app.locales' => ['pt', 'jp']]);
    
        $this->get('/')
            ->assertSee('jp')
            ->assertSee('pt');
    }
}
