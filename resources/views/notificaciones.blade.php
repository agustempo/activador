@extends('layouts.home')

@section('title')
{{ __('frontend.mis_notificaciones') }}
@endsection('title')
 
@section('content')
<div class="section content">
	<h3 class="title is-4">{{ __('frontend.mis_notificaciones') }}</h3>
	<ul>
	@foreach (auth()->user()->notifications as $notificacion)
		<li><a href=""> {{ $notificacion->id }}</a>
			<form 
				id="form-marcar-leida" 
				method="POST" 
				action="/notificaciones/{{ $notificacion->id }}"
				style="display:none" >
		        {{ csrf_field() }}
		        {{ method_field('post') }}
		    </form>
		    <a onclick="event.preventDefault();document.getElementById('form-marcar-leida').submit();" 
		    class="button is-info">{{ __('frontend.marcar_como_leida') }}</a>
	   	</li>
	@endforeach
	</ul>
</div>
@endsection('content')