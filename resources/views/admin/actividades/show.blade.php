@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")
	
	<div class="container">

		@include('admin.actividades.menu')

		<h4 class="title is-4">{{ $actividad->nombre }}</h4>
		
		<form method="POST" action="" >

			@include("admin.actividades.form", [ 'deshabilitado' => true ])

		</form>

		<br/>

		<div class="field is-grouped" >
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

		<ul>
			@foreach ($actividad->auditoria as $auditoria)
				<li>{{ $auditoria->descripcion }}</li>
			@endforeach
		</ul>

		<p><a href="/admin/actividades" >{{ __(('admin.atras')) }}</a></p>

	</div>
@endsection("content")