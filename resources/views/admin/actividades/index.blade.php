@extends('admin.layout')

@section('title')
{{ __('admin.listado_de') }} {{ __('actividades.actividades') }}
@endsection('title')

@section('content')
	<p><a href="/admin/actividades/create" class="button is-primary" >{{ __('admin.nueva') }}</a></p>

	<h1 class="title" >{{ __('admin.listado_de') }} {{ __('actividades.actividades') }}</h1>
	<ul>
	@foreach ($actividades as $actividad)

		<li><a href="/admin/actividades/{{ $actividad->id }}">{{ $actividad->nombre }}</a></li>

	@endforeach
	</ul>
@endsection('content')