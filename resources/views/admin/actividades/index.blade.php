@extends('admin.layout')

@section('title')
{{ __('admin.listado_de') }} {{ __('actividades.actividades') }}
@endsection('title')

@section('content')
	<div class="content">
		<p><a href="/admin/actividades/create" class="button is-primary" >{{ __('admin.nueva') }}</a></p>

		<h4>{{ __('admin.listado_de') }} {{ __('actividades.actividades') }}</h4>
		<ul>
		@foreach ($actividades as $actividad)

			<li><a href="/admin/actividades/{{ $actividad->id }}">{{ $actividad->nombre }}</a></li>

		@endforeach
		</ul>
	</div>
@endsection('content')