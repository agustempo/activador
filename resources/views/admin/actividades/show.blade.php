@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")

	<p><a href="/admin/actividades">{{ __(('admin.atras')) }}</a></p>

	<h1 class="title" >{{ $actividad->nombre }}</h1>
	
	<form method="POST" action="/admin/actividades" >
		
		{{ csrf_field() }}

		<fieldset disabled>

		<div class="field">
			<label class="label">{{ __(('actividades.nombre')) }}</label>
	  		<div class="control">
				<input class="input" type="text" name="nombre" value="{{ $actividad->nombre }}" ></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.descripcion')) }}</label>
	  		<div class="control">
				<textarea class="textarea" >{{ $actividad->descripcion }}</textarea>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.fecha_inicio')) }}</label>
	  		<div class="control">
				<input class="input" type="text" name="fecha_inicio" value="{{ $actividad->fecha_inicio }}" ></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.fecha_fin')) }}</label>
	  		<div class="control">
				<input class="input" type="text" name="fecha_fin" value="{{ $actividad->fecha_fin }}" ></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.lugar')) }}</label>
	  		<div class="control">
				<input class="input" type="text" name="lugar" value="{{ $actividad->lugar }}" ></input>
			</div>
		</div>

		</fieldset>
	</form>

	<br/>

	<a href="/admin/actividades/{{ $actividad->id }}/edit" class="button is-link">{{ __(('admin.editar')) }}</a>

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<input type="submit" class="button is-danger" value="{{ __(('admin.eliminar')) }}" ></input>
	</form>

	<h2>Inscriptos</h2>

	@forelse ($actividad->inscriptos as $inscripto)
		<li>{{ $inscripto->usuario->nombre }}</li>
	@empty
		<li>No hay ningún inscripto</li>
	@endforelse

@endsection("content")