@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>
	
	@include("admin.actividades.menu")

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}/inscripciones" >
		
		{{ csrf_field() }}

		<div class="">
			<div class="select">
				<select name="id_usuario">
				<option value="" disabled selected >{{ __(('admin.seleccionar_usuario')) }}</option>
				@foreach ($usuarios as $usuario)
					<option  value="{{ $usuario->id }}" >{{ $usuario->email }}</option>
				@endforeach
				</select>
			</div>
			<input type="submit" class="button is-link" value="{{ __(('admin.inscribir')) }}" ></input>
		</div>

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
				<li>
					<div class="field buttons are-small">
						{{ $inscripto->usuario->nombre }} ({{ $inscripto->confirmada }}) 
						
						<p class="control">
							<form method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('PATCH') }}
								{{ csrf_field() }}
								<input type="hidden" name="confirmar" value="1" ></input>
								<input type="submit" class="button is-primary" value="{{ __(('admin.confirmar')) }}" ></input>
							</form>
						</p>

						<p class="control">
							<form method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<input type="submit" class="button is-danger" value="{{ __(('admin.eliminar')) }}" ></input>
							</form>
						</p>
					</div>
				</li>
			@empty
				<li>No hay ningún inscripto</li>
			@endforelse
		</ul>
	</div>

@endsection("content")