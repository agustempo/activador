@extends('layouts.home')

@section('title')
{{ __('frontend.mis_beneficios')}}
@endsection('title')
 
@section('content')

<section class="hero is-light" style="height: 212px">
    <div class="hero-body" style="display: flex; align-items: center; justify-content: center;">
        <h1 class="title align-center" >{{ __('frontend.mis_beneficios') }}</h1>

    </div>
</section>

<div class="section content">
	<table class="table">
  <thead>
    <tr>
      <th>Institución</th>
      <th>Oferta Académica</th>
      <th>Beneficio</th>
      <th>Contacto</th>
    </tr>
  </thead>
  <tbody>
  	@if (auth()->user()->cohorte < 2018)
	    <tr>
	      <th>FLACSO Alumni</th>
	      <td><a href="https://www.flacso.org.ar/formacion-academica/ciencias-sociales-con-orientacion-en-educacion/" target="_blank">Área Ciencias Sociales (orientación en Educación)</a>
	      </td>
	      <td>50%</td>
	      <td>maestriaedusec@flacso.org.ar</td>
	    </tr>
	    <tr>
	    	<th>FLACSO</th>
	    	<td>Área Psicología del Conocimiento y Aprendizaje</td>
	    	<td>15 %</td>
	    	<td>mariob@ensenaporargentina.org</td>
	    </tr>
	@else
		<tr>
	      <th>FLACSO </th>
	      <td><a href="https://www.flacso.org.ar/formacion-academica/ciencias-sociales-con-orientacion-en-educacion/"¿ target="_blank">Área Ciencias Sociales (orientación en Educación)</a>
	      </td>
	      <td>10%</td>
	      <td>maestriaedusec@flacso.org.ar</td>
	    </tr>
	    <tr>
	    	<th>FLACSO</th>
	    	<td>Área Psicología del Conocimiento y Aprendizaje</td>
	    	<td>15 %</td>
	    	<td>mariob@ensenaporargentina.org</td>
	    </tr>
	@endif
  </tbody>
</table>
	
</div>
@endsection('content')