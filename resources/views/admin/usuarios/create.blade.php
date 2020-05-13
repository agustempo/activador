@extends("layouts.home")

@section('title')
Nuevo Usuario
@endsection('title')
	
@section("content")
<div class="section">
	
	<h1 class="title is-4" >{{ __(('admin.nueva')) }} {{ __(('admin.usuario')) }}</h1>
	
	<form method="POST" action="/admin/usuarios/" >

		@include("admin.usuarios.form", [ 'usuario' => new App\Usuario, 'textoBoton' => __(('admin.nueva')), 'deshabilitado' => false ])

		<input type="submit" class="button is-link" dusk="crear" value="{{ __(('admin.nueva')) }}" ></input>
		
	</form>
</div>

@endsection("content")