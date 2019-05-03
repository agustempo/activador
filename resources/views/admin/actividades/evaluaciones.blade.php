@extends("admin.actividades.actividad")

@section("contenido-actividad")
<div class="content" >
	<ul>
		@forelse ($actividad->evaluaciones as $evaluacion)
			<li>
				<b>{{ $evaluacion->usuario->nombreCompleto }}</b>
				<span>{{ $evaluacion->puntaje }}</span>
				<span>{{ $evaluacion->comentario }}</span>
			</li>
		@empty
			<li>{{ __('admin.no_hay_evaluaciones') }}</li>
		@endforelse
	</ul>
</div>
@endsection("contenido-actividad")