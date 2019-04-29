@extends('layouts.home')

@section('title')
{{ __('frontend.mis_inscripciones') }}
@endsection('title')
 
@section('content')
<div class="section content">
	<h3 class="is-title is-3">{{ __('frontend.mis_inscripciones') }}</h3>
	<ul>
	@foreach ($inscripciones as $inscripcion)
		<li><a href="/actividades/{{ $inscripcion->actividad->id }}"> {{ $inscripcion->actividad->nombre }}</a>
			<form 
				id="form-desinscribirme" 
				method="POST" 
				action="/inscripciones/{{ $inscripcion->id }}"
				style="display:none" >
		        {{ csrf_field() }}
		        {{ method_field('delete') }}
		    </form>
		    <a onclick="event.preventDefault();document.getElementById('form-desinscribirme').submit();" 
		    class="button is-danger">{{ __('frontend.desinscribirme') }}</a>
	   	</li>
	@endforeach
	</ul>
</div>
@endsection('content')