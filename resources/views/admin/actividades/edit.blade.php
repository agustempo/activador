@extends("admin.actividades.actividad")

@section("contenido-actividad")


	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" id="actividad"   enctype="multipart/form-data">
		
		{{ method_field('PATCH') }}

		@include("admin.actividades.form", [ 'deshabilitado' => false ])

		<input type="submit" class="button is-primary" value="{{ __(('admin.guardar')) }}" ></input>
				<a class="button" href="/admin/actividades/{{ $actividad->id }}" > {{ __(('admin.atras')) }}</a>

	</form>

@endsection("contenido-actividad")

@section('extra_js')
<script>

	var form = document.querySelector('form#actividad');
	form.onsubmit = function() {
	  	// Populate hidden form on submit
	  	var campo = document.querySelector('input[name=descripcion]');
	  	campo.value = document.querySelector('.ql-editor').innerHTML;
	}
</script>

@endsection('extra_js')
