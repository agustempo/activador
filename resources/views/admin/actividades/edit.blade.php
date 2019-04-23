@extends("admin.layout")

@section('title')
Editar actividad {{ $actividad->nombre }}
@endsection('title')
	
@section("content")
<div class="container">

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>
	
	@include("admin.actividades.menu")

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
		
		{{ method_field('PATCH') }}

		@include("admin.actividades.form", [ 'deshabilitado' => false ])

		<input type="submit" class="button is-link" value="{{ __(('admin.editar')) }}" ></input>

	</form>

	<p><a href="/admin/actividades">{{ __(('admin.atras')) }}</a></p>
</div>
@endsection("content")