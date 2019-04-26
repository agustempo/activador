@extends('layouts.home')
 
@section('content')

<ul>
@foreach ($inscripciones as $inscripcion)
	<li>{{ $inscripcion->actividad->nombre }}
		<form 
			id="form-desinscribirme" 
			method="POST" 
			action="/inscripciones/{{ $inscripcion->id }}"
			style="display:none" >
	        {{ csrf_field() }}
	        {{ method_field('delete') }}
	    </form>
	    <a onclick="event.preventDefault();document.getElementById('form-desinscribirme').submit();" class="button">{{ __('desinscribirme') }}</a>
   	</li>
@endforeach
</ul>

@endsection('content')