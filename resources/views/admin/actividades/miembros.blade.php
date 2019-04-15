@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>
	
	@include("admin.actividades.menu")

	<div class="content" >
		<ul>
			@forelse ($actividad->miembros as $miembro)
				<li>
					{{ $miembro->nombre }}
				</li>
			@empty
				<li>No hay ningún miembro</li>
			@endforelse
		</ul>
	</div>

@endsection("content")