@extends('layouts.home')

@section('title')
{{ __('admin.listado_de') }} {{ __('admin.actividades') }}
@endsection('title')

@section('content')
<div class="section">
	<div class="content">
		<p><a href="/admin/actividades/create" class="button is-primary" >{{ __('admin.nueva') }}</a></p>

		<h4>{{ __('admin.listado_de') }} {{ __('admin.actividades') }}</h4>
	<!-- 	<ul>
		@foreach ($actividades as $actividad)

			<li><a href="/admin/actividades/{{ $actividad->id }}">{{ $actividad->nombre }}</a></li>

		@endforeach
		</ul> -->

		<div class="flex-center position-ref full-height" id="app">
			<data-table
				fetch-url="{{ route('actividades.table') }}"
				:columns="['id', 'nombre', 'organizacion' , 'fin', 'lugar']"
				:view-url="'actividades/'"
			></data-table>
		</div>

	</div>
</div>
@endsection('content')