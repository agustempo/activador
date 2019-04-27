@extends("admin.actividades.actividad")
	
@section("contenido-actividad")
<ul>
	@foreach ($actividad->auditoria as $auditoria)
		<li>
			@include ("admin.actividades.auditoria.{$auditoria->descripcion}")
		</li>
	@endforeach
</ul>
@endsection("contenido-actividad")