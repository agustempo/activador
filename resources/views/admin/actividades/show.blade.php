@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")
	
	<div class="container">

		<h4 class="title is-4">{{ $actividad->nombre }}</h4>

		@include('admin.actividades.menu')
		
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

		<p><a href="/admin/actividades" >{{ __(('admin.atras')) }}</a></p>

	</div>
@endsection("content")