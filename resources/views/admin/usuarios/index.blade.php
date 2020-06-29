@extends('layouts.home')

@section('title')
{{ __('admin.listado_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')
<div class="section">
	<div class="content">
		
		<h3>{{ __('admin.listado_de') }} {{ __('admin.usuarios') }} 
			<a href="/admin/usuarios/create" class="button is-link" >+</a>
		</h3>
		<p></p>

		<div class="flex-center position-ref full-height" id="app">
			<data-table
				fetch-url="{{ route('usuarios.table') }}"
				:columns="['nombre', 'apellido', 'cohorte' , 'región', 'trayectoria', 'carrera']"
				:view-url="'/admin/usuarios/'"
				:filtro="true"
			></data-table>
		</div>
	</div>
</div>
@endsection('content')