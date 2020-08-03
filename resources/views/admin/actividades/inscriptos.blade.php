@extends("admin.actividades.actividad")

@section("contenido-actividad")

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

		@if(session('mensajes'))
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
					<tr><td>
							<a href="/admin/usuarios/{{ $inscripto->usuario->id}}">
								{{ $inscripto->usuario->nombre }} {{ $inscripto->usuario->apellido }}
							</a>
						</td>
						<td>
						<div class="buttons is-right are-small">

							<form id="form-presente-{{$inscripto->id}}" method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('PATCH') }}
								{{ csrf_field() }}
								<input type="hidden" name="presente" value="{{  $inscripto->presente === 1 ? 0 : 1 }}" ></input>
									<a href="javascript:{}" class="button" onclick="document.getElementById('form-presente-{{$inscripto->id}}').submit()" >
										<span class="is-hidden-touch" >{{  __(('admin.presente')) }}</span>
										<span class="icon" >
											<i class="fas {{  $inscripto->presente === 1 ? __(('fa-toggle-on')):__(('fa-toggle-off')) }}" ></i>
										</span>
									</a>
							</form>
							<!-- 
							<form id="form-confirma-{{$inscripto->id}}" method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('PATCH') }}
								{{ csrf_field() }}
								<input type="hidden" name="confirma" value="{{  $inscripto->confirma === 1 ? 0 : 1 }}" ></input>
									<a href="javascript:{}" class="button" onclick="document.getElementById('form-confirma-{{$inscripto->id}}').submit()" >
										<span class="is-hidden-touch" >{{  __(('admin.confirmar')) }}</span>
										<span class="icon" >
											<i class="fas {{  $inscripto->confirma === 1 ? __(('fa-toggle-on')):__(('fa-toggle-off')) }}" ></i>
										</span>
									</a>
							</form>
 -->
							<form id="form-eliminar-{{$inscripto->id}}" method="POST" action="{{ $inscripto->path_admin() }}" >
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<a href="javascript:{}" class="button is-danger" onclick="document.getElementById('form-eliminar-{{$inscripto->id}}').submit()" >
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
					<tr><td>{{ __(('admin.no_hay_inscriptos')) }}</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
@endsection("contenido-actividad")