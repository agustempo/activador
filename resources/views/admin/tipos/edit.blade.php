@extends("admin.layout")

@section('title')
Editar actividad {{ $actividad->nombre }}
@endsection('title')
	
@section("content")

	<p><a href="/admin/tipos" >{{ __(('admin.atras')) }}</a></p>
	
	<h1 class="title" >Editar: {{ $actividad->nombre }}</h1>

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
		
		{{ method_field('PATCH') }}
		{{ csrf_field() }}

		<div class="field">
			<label class="label">Nombre</label>
	  		<div class="control">
				<input class="input" type="text" name="nombre" value="{{ $actividad->nombre }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Descripción</label>
	  		<div class="control">
				<textarea class="textarea" >{{ $actividad->descripcion }}</textarea>
			</div>
		</div>
		<div class="field">
			<label class="label">Lugar</label>
	  		<div class="control">
				<input class="input" type="text" name="lugar" value="{{ $actividad->lugar }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Estado</label>
	  		<div class="control">
				<input class="input" type="text" name="estado" value="{{ $actividad->estado }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Visibilidad</label>
	  		<div class="control">
				<input class="input" type="text" name="visibilidad" value="{{ $actividad->visibilidad }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Tipo</label>
	  		<div class="control">
				<input class="input" type="text" name="id_tipo" value="{{ $actividad->id_tipo }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Fecha Inicio</label>
	  		<div class="control">
				<input class="input" type="text" name="fechaInicio" value="{{ $actividad->fechaInicio }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Fecha Fin</label>
	  		<div class="control">
				<input class="input" type="text" name="fechaFin" value="{{ $actividad->fechaFin }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Límite de Inscripciones</label>
	  		<div class="control">
				<input class="input" type="text" name="limiteInscripciones" value="{{ $actividad->limiteInscripciones }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Mensaje para los inscriptos</label>
	  		<div class="control">
				<input class="input" type="text" name="mensajeInscripciones" value="{{ $actividad->mensajeInscripciones }}" ></input>
			</div>
		</div>

		<input type="submit" class="button is-link" value="Editar" ></input>

	</form>

@endsection("content")