@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}/inscripciones" >
		
		{{ csrf_field() }}

		<div class="select">
			<select name="id_usuario">
			@foreach ($usuarios as $usuario)
				<option  value="{{ $usuario->id }}" >{{ $usuario->email }}</option>
			@endforeach
			</select>
		</div>

		<br/>
		<br/>

		<input type="submit" class="button is-link" value="{{ __(('admin.inscribir')) }}" ></input>

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

	</form>

	<div class="content" >
		<ul>
			@forelse ($actividad->inscriptos as $inscripto)
				<li>{{ $inscripto->usuario->nombre }}</li>
			@empty
				<li>No hay ningún inscripto</li>
			@endforelse
		</ul>
	</div>

@endsection("content")