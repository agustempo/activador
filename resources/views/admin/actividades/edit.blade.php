@extends("admin.actividades.actividad")

@section("contenido-actividad")

<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
	
	{{ method_field('PATCH') }}

	@include("admin.actividades.form", [ 'deshabilitado' => false ])

	<input type="submit" class="button is-primary" value="{{ __(('admin.editar')) }}" ></input>

</form>

@endsection("contenido-actividad")