@extends("layouts.home")

@section('title')
Nueva actividad
@endsection('title')
	
@section("content")
	<br>
	
	<h1 class="title is-4" >{{ __(('admin.nueva')) }} {{ __(('actividades.actividad')) }}</h1>
	
	<form method="POST" action="/admin/actividades/" >

		@include("admin.actividades.form", [ 'actividad' => new App\Actividad, 'textoBoton' => __(('admin.nueva')), 'deshabilitado' => false ])

		<input type="submit" class="button is-link" value="{{ __(('admin.nueva')) }}" ></input>
		
	</form>

	<br>

@endsection("content")