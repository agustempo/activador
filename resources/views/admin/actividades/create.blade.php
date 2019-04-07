@extends("admin.layout")

@section('title')
Nueva actividad
@endsection('title')
	
@section("content")
	
	<h1 class="title">{{ __(('admin.nueva')) }} {{ __(('actividades.actividad')) }}</h1>
	
	<form method="POST" action="/admin/actividades/" >

		@include("admin.actividades.form", [ 'actividad' => new App\Actividad, 'textoBoton' => __(('admin.nueva')), 'deshabilitado' => false ])

		<input type="submit" class="button is-link" value="{{ __(('admin.nueva')) }}" ></input>
		
	</form>

	<p><a href="/admin/actividades">{{ __(('admin.atras')) }}</a></p>

@endsection("content")