@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")

	<h1 class="title">{{ $actividad->nombre }}</h1>
	
	<form method="POST" action="" >

		@include("admin.actividades.form", [ 'deshabilitado' => true ])

	</form>

	<br/>

	<div class="field is-grouped is-grouped-right" >
		<p class="control">
			<a class="button" href="/admin/actividades/{{ $actividad->id }}/edit" > {{ __(('admin.editar')) }}</a>
		</p>

		<p class="control" >
			<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="submit" class="button is-danger" value="{{ __(('admin.eliminar')) }}" ></input>
			</form>
		</p>
	</div>

	@if($errors->any())
	<div class="notification is-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<p><a href="/admin/actividades" >{{ __(('admin.atras')) }}</a></p>

	<h2>Inscriptos</h2>

	@forelse ($actividad->inscriptos as $inscripto)
		<li>{{ $inscripto->usuario->nombre }}</li>
	@empty
		<li>No hay ningún inscripto</li>
	@endforelse

@endsection("content")