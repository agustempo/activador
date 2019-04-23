@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")
<div class="container">

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>
	
	@include("admin.actividades.menu")

	<form method="POST" action="/admin/actividades/{{ $actividad->id }}/inscripciones" >
		
		{{ csrf_field() }}

		<div class="field is-flex-desktop">
			<div class="control">
				<div class="select">
					<select name="id_usuario">
					<option value="" disabled selected >{{ __(('admin.seleccionar_usuario')) }}</option>
					@foreach ($usuarios as $usuario)
						<option  value="{{ $usuario->id }}" >{{ $usuario->email }}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="control">
				<input type="submit" class="button is-link" value="{{ __(('admin.inscribir')) }}" ></input>
			</div>
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
		<table class="table">
			<tbody>
				@forelse ($actividad->inscriptos as $inscripto)
					<tr><td>{{ $inscripto->usuario->nombre }} {{ $inscripto->usuario->apellido }}</td>
						<td>
						<div class="buttons is-right are-small">

							<form id="form-presente" method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('PATCH') }}
								{{ csrf_field() }}
								<input type="hidden" name="presente" value="{{  $inscripto->presente === 1 ? 0 : 1 }}" ></input>
									<a href="javascript:{}" class="button" onclick="document.getElementById('form-presente').submit()" >
										<span class="is-hidden-touch" >{{  $inscripto->presente === 1 ? __(('admin.ausente')):__(('admin.presente')) }}</span>
										<span class="icon" >
											<i class="fas {{  $inscripto->presente === 1 ? __(('fa-toggle-on')):__(('fa-toggle-off')) }}" ></i>
										</span>
									</a>
							</form>
							
							<form id="form-confirma" method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('PATCH') }}
								{{ csrf_field() }}
								<input type="hidden" name="confirma" value="{{  $inscripto->confirma === 1 ? 0 : 1 }}" ></input>
									<a href="javascript:{}" class="button" onclick="document.getElementById('form-confirma').submit()" >
										<span class="is-hidden-touch" >{{  $inscripto->confirma === 1 ? __(('admin.desconfirmar')):__(('admin.confirmar')) }}</span>
										<span class="icon" >
											<i class="fas {{  $inscripto->confirma === 1 ? __(('fa-toggle-on')):__(('fa-toggle-off')) }}" ></i>
										</span>
									</a>
							</form>

							<form id="form-eliminar" method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<a href="javascript:{}" class="button is-danger" onclick="document.getElementById('form-eliminar').submit()" >
									<span class="is-hidden-touch" >{{ __(('admin.eliminar')) }}</span>
									<span class="icon" >
										<i class="fas fa-trash" ></i>
									</span>
								</a>
							</form>

						</div>
						</td>
					</tr>
				@empty
					<span>No hay ningún inscripto</span>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

@endsection("content")