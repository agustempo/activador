@extends("admin.layout")
	
@section("content")

	<p><a href="/admin/actividades">{{ __(('admin.atras')) }}</a></p>
	
	<h1 class="title">{{ __(('admin.nueva')) }} {{ __(('actividades.actividad')) }}</h1>
	
	<form method="POST" action="/admin/actividades" >
		
		{{ csrf_field() }}

		<div class="field">
			<label class="label">{{ __(('actividades.nombre')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" type="text" name="nombre" value="{{ old('nombre') }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.descripcion')) }}</label>
	  		<div class="control">
				<textarea class="textarea {{ $errors->has('descripcion') ? 'is-danger' : '' }}" name="descripcion" >{{ old('descripcion') }}</textarea>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.fecha_inicio')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('fecha_inicio') ? 'is-danger' : '' }}" type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.fecha_fin')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('fecha_fin') ? 'is-danger' : '' }}" type="date" name="fecha_fin" value="{{ old('fecha_fin') }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.lugar')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('lugar') ? 'is-danger' : '' }}" type="text" name="lugar" value="{{ old('lugar') }}" ></input>
			</div>
		</div>

		<input type="submit" class="button is-primary" value="{{ __(('admin.crear')) }}" ></input>
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