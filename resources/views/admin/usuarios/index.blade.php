@extends('layouts.home')

@section('title')
{{ __('admin.listado_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')
<div class="section">
	<div class="content">
		
		<h3>{{ __('admin.listado_de') }} {{ __('admin.usuarios') }}</h3>
		<p><a href="/admin/usuarios/create" class="button is-link" >{{ __('admin.nuevo') }}</a></p>

		<table class="table">
		  <thead>
		    <tr>
		      <th>Nombre</th>
		      <th>Apellido</th>
		      <th><abbr title="Cohorte">Cohorte</abbr></th>
		      <th>Región</th>
		      <th>Trayectoria</th>
		    </tr>
		  </thead>
		  <tbody>
		  		@foreach ($usuarios as $usuario)

					<tr>
						<td><a href="/admin/usuarios/{{ $usuario->id }}">{{ $usuario->nombre }}</a></td>
						<td>{{ $usuario->apellido }}</td>
						<td>{{ $usuario->cohorte }}</td>
						<td>{{ $usuario->región }}</td>
						<td>{{ $usuario->trayectoria }}</td>
					</tr>
				@endforeach
		  </tbody>
		</table>
	</div>
</div>
@endsection('content')