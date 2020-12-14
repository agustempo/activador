@extends ('layouts.home')


@section('title')
{{ __('admin.detalle_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')
<div class="section">
	<div class="content">
		<div class="columns is-centered">
	        <figure class="image is-128x128">
				<img class="is-rounded" src="/storage/foto_perfil/{{ $usuario->foto_perfil }}">
			</figure>
	        <h3>{{ $usuario->nombre }} {{ $usuario->apellido }} </h3>
      	</div>
      	
		@include("admin.usuarios.menu")

		<table class="table">
			<thead>
				<th>Pasantía</th>
				<th>Presente</th>
			</thead>
			<tbody>
				@forelse ($usuario->inscripciones as $inscripto)
					<tr>
						<td>
							<a href="/actividades/{{$inscripto->actividad->id}}" >{{ $inscripto->actividad->nombre }}</a>
						</td><td>
									<span class="icon" >
										<i class="fas {{  $inscripto->presente === 1 ? __(('fa-check-circle')):__(('fa-times-circle')) }}" ></i>
									</span>
						</td>
					</tr>
				@empty
					<tr><td>{{ __(('admin.no_hay_inscriptos')) }}</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

@endsection("content")