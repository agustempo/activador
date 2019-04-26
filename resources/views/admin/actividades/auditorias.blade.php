@extends("layouts.home")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")
<div class="section">

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>

	@include('admin.actividades.menu')

	<ul>
		@foreach ($actividad->auditoria as $auditoria)
			<li>
				@include ("admin.actividades.auditoria.{$auditoria->descripcion}")
			</li>
		@endforeach
	</ul>
</div>

@endsection("content")