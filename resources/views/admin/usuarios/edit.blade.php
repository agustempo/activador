@extends ('layouts.home')


@section('title')
{{ __('admin.detalle_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')


<div class="section">

	<div class="content" id="app">

		<form method="POST" action="/admin/usuarios/{{ $usuario->id }}" enctype="multipart/form-data">
			{{ method_field('PATCH') }}
			@include("admin.usuarios.form", [ 'deshabilitado' => false ])
			<input type="submit" class="button is-link" value="{{ __(('admin.guardar')) }}" ></input>
			<a class="button" href="/admin/usuarios/{{ $usuario->id }}" > {{ __(('admin.atras')) }}</a>
		</form>
	</div>
</div>

@endsection("content")

