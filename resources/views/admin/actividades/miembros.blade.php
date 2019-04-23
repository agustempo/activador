@extends("admin.layout")
	
@section('title')
{{ $actividad->nombre }}
@endsection('title')

@section("content")

<div class="container">

	<h4 class="title is-4">{{ $actividad->nombre }}</h4>
	
	@include("admin.actividades.menu")

	<div>
		<form class="form" method="POST" action="{{ $actividad->path_admin() . '/invitaciones' }}" >
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
					<input class="button is-primary" type="submit" value="{{ __(('admin.invitar')) }}" />
				</div>
			</div>
		</form>

		@if($errors->any())
		<div class="notification is-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>

	<div class="content" >
		<ul>
			@forelse ($actividad->miembros as $miembro)
				<li>
					{{ $miembro->nombre }}
				</li>
			@empty
				<li>No hay ningún miembro</li>
			@endforelse
		</ul>
	</div>
</div>
@endsection("content")