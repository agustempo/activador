@extends("layouts.home")

@section('title')
Nueva actividad
@endsection('title')
	
@section("content")
<div class="section">
	
	<h1 class="title is-4" >{{ __(('admin.nueva')) }} {{ __(('admin.actividad')) }}</h1>
	
	<form method="POST" action="/admin/actividades/" >

		@include("admin.actividades.form", [ 'actividad' => new App\Actividad, 'textoBoton' => __(('admin.nueva')), 'deshabilitado' => false ])

		<input type="submit" class="button is-link" dusk="crear" value="{{ __(('admin.nueva')) }}" ></input>
		
	</form>
</div>

@endsection("content")