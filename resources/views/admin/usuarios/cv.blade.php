@extends ('layouts.home')


@section('title')
{{ __('admin.detalle_de') }} {{ __('admin.usuarios') }}
@endsection('title')

@section('content')




<div class="section">
	<div class="content">
		@include("admin.usuarios.menu")

	<form action="/admin/usuarios/{{ $usuario->id }}/cv" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }}

    	Curriculum:
    	@if (is_null($usuario->cv))
    		CV no cargado!
    	@else
    	  	<a href="/storage/cv/{{ $usuario->cv }}" target="_blank">
    			Ver
    		</a>
    	@endif

    	<br>
    	<br>
    	
    	Cargar Nuevo:
    	<input type="file" name="cv" />
    	<br />
    	<br />

		@if($errors->any())
			<div class="notification is-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
    	<br />
    	<input type="submit" class="button is-success"  value="Guardar" />
    	<a class="button" href="/admin/usuarios/" > {{ __(('admin.atras')) }}</a>
	</form>

		
	</div>
</div>

@endsection("contenido-content")