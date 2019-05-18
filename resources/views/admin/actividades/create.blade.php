@extends("layouts.home")

@section('title')
Nueva actividad
@endsection('title')
	
@section("content")
<div class="section">

	<div class="columns">

		<div class="column is-8 is-offset-2">
		
			<h1 class="title is-4" >{{ __(('admin.nueva')) }} {{ __(('admin.actividad')) }}</h1>
			
			<form method="POST" action="/admin/actividades/" >

				@include("admin.actividades.form", [ 'actividad' => new App\Actividad, 'textoBoton' => __(('admin.nueva')), 'deshabilitado' => false ])

				<input type="submit" class="button is-primary" dusk="crear" value="{{ __(('admin.nueva')) }}" ></input>
				
			</form>

		</div>
	</div>

</div>

@endsection("content")