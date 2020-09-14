@extends ('layouts.home')


@section('title')
{{ __('admin.detalle_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')
<div class="section">

	<div class="content" >
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