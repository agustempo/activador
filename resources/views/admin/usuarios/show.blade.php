@extends ('layouts.home')


@section('title')
{{ __('admin.detalle_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')




<div class="section">
	<div class="content">
		@include("admin.usuarios.menu")
		<form method="POST" action="" >
			@include("admin.usuarios.form", [ 'deshabilitado' => true ])
		</form>

		<br/>

		<div class="field is-grouped" id="app">
			<p class="control">
				<a class="button" href="javascript:history.back()" > {{ __(('admin.atras')) }}</a>
			</p>
			<p class="control">
				<a class="button" href="/admin/usuarios/{{ $usuario->id }}/edit" > {{ __(('admin.editar')) }}</a>
			</p>
			<form id="form-eliminar" method="POST" action="/admin/usuarios/{{ $usuario->id }}" style="display:none" >
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
			<p class="control" >
				<a class="button is-danger" onclick="document.getElementById('form-eliminar').submit()" > {{ __(('admin.eliminar')) }}</a>
			</p>
		</div>
	</div>
</div>

@endsection("contenido-content")