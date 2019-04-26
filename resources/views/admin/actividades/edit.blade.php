@extends("layouts.home")

@section('title')
Editar actividad {{ $actividad->nombre }}
@endsection('title')
	
@section("content")
<div class="section">

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>
	
	@include("admin.actividades.menu")

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
		
		{{ method_field('PATCH') }}

		@include("admin.actividades.form", [ 'deshabilitado' => false ])

		<input type="submit" class="button is-link" value="{{ __(('admin.editar')) }}" ></input>

	</form>

</div>
@endsection("content")