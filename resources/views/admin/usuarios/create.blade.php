@extends("layouts.home")

@section('title')
Nuevo Usuario
@endsection('title')
	
@section("content")
<div class="section">
	<form method="POST" action="/admin/usuarios" id="app"  enctype="multipart/form-data">

		@include("admin.usuarios.form", [ 'usuario' => new App\Usuario, 'textoBoton' => __(('admin.nueva')), 'deshabilitado' => false ])

		<input type="submit" class="button is-link" dusk="crear" value="{{ __(('admin.nueva')) }}" ></input>
		
	</form>
</div>

@endsection("content")