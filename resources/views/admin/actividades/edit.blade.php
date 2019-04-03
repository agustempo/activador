@extends("admin.layout")

@section('title')
Editar actividad {{ $actividad->nombre }}
@endsection('title')
	
@section("content")
	
	<p><a href="/admin/actividades">{{ __(('admin.atras')) }}</a></p>

	<h1 class="title">{{ __(('admin.editar')) }}: {{ $actividad->nombre }}</h1>

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}" >
		
		{{ method_field('PATCH') }}
		{{ csrf_field() }}

		<div class="field">
			<label class="label">Nombre</label>
	  		<div class="control">
				<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" type="text" name="nombre" value="{{ $actividad->nombre }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Descripción</label>
	  		<div class="control">
				<textarea class="textarea {{ $errors->has('descripcion') ? 'is-danger' : '' }}" name="descripcion" >{{ $actividad->descripcion }}</textarea>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.fecha_inicio')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('fecha_inicio') ? 'is-danger' : '' }}" type="text" name="fecha_inicio" value="{{ $actividad->fecha_inicio }}" ></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.fecha_fin')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('fecha_fin') ? 'is-danger' : '' }}" type="text" name="fecha_fin" value="{{ $actividad->fecha_fin }}" ></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.lugar')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('lugar') ? 'is-danger' : '' }}" type="text" name="lugar" value="{{ $actividad->lugar }}" ></input>
			</div>
		</div>

		<input type="submit" class="button is-link" value="Editar" ></input>

	</form>

	<br/>

	@if($errors->any())
	<div class="notification is-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

@endsection("content")