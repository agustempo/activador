@extends("admin.actividades.actividad")

@section("contenido-actividad")

<form method="POST" action="" >

	@include("admin.actividades.form", [ 'deshabilitado' => true ])

</form>

<br/>

<div class="field is-grouped" >
	<p class="control">
		<a class="button" href="/admin/actividades/{{ $actividad->id }}/edit" > {{ __(('admin.editar')) }}</a>
	</p>
	<form id="form-eliminar" method="POST" action="/admin/actividades/{{ $actividad->id }}" style="display:none" >
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
	</form>
	<p class="control" >
		<a class="button is-danger" onclick="document.getElementById('form-eliminar').submit()" > {{ __(('admin.eliminar')) }}</a>
	</p>
</div>

@endsection("contenido-actividad")