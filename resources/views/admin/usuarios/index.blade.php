@extends('layouts.home')

@section('title')
{{ __('admin.listado_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')
<div class="section">
	<div class="content">
		<p><a href="/admin/usuarios/create" class="button is-link" >{{ __('admin.nueva') }}</a></p>

		<h4>{{ __('admin.listado_de') }} {{ __('admin.usuarios') }}</h4>
		<ul>
		@foreach ($usuarios as $usuario)

			<li><a href="/admin/usuarios/{{ $usuario->id }}">{{ $usuario->nombre }}</a></li>

		@endforeach
		</ul>
	</div>
</div>
@endsection('content')