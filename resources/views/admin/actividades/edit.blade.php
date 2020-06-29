@extends("admin.actividades.actividad")

@section("contenido-actividad")


	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
		
		{{ method_field('PATCH') }}

		@include("admin.actividades.form", [ 'deshabilitado' => false ])

		<input type="submit" class="button is-primary" value="{{ __(('admin.guardar')) }}" ></input>
				<a class="button" href="/admin/actividades/{{ $actividad->id }}" > {{ __(('admin.atras')) }}</a>

	</form>

@endsection("contenido-actividad")