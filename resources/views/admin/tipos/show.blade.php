@extends("admin.layout")
	
@section('title')
{{ $tipo->nombre }}
@endsection('title')

@section("content")

	<p><a href="/admin/tipos">{{ __(('admin.atras')) }}</a></p>

	<h1 class="title" >{{ $tipo->nombre }}</h1>
	
	<form method="POST" action="/admin/tipos" >
		
		{{ csrf_field() }}

		<fieldset disabled>

		<div class="field">
			<label class="label">{{ __(('tipos.nombre')) }}</label>
	  		<div class="control">
				<input class="input" type="text" name="nombre" value="{{ $tipo->nombre }}" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('tipos.descripcion')) }}</label>
	  		<div class="control">
				<textarea class="textarea" >{{ $tipo->descripcion }}</textarea>
			</div>
		</div>
		
		</fieldset>
	</form>

	<br/>

	<a href="/admin/</{{ $tipo->id }}/edit" class="button is-link">{{ __(('admin.editar')) }}</a>

	<form method="POST" action="/admin/tipos/{{ $tipo->id }}" >
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<input type="submit" class="button is-danger" value="{{ __(('admin.eliminar')) }}" ></input>
	</form>

@endsection("content")