@extends("admin.layout")
	
@section("content")
	
	<p><a href="/admin/tipos">{{ __(('admin.atras')) }}</a></p>

	<h1 class="title" >{{ __('admin.nuevo') }} {{ __('tipos.tipo') }}</h1>

	<form method="POST" action="/admin/tipos" >
		
		{{ csrf_field() }}

		<div class="field">
			<label class="label">{{ __('tipos.nombre') }}</label>
	  		<div class="control">
				<input class="input" type="text" name="nombre" value="" ></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __('tipos.descripcion') }}</label>
	  		<div class="control">
				<textarea class="textarea" ></textarea>
			</div>
		</div>

		<input type="submit" class="button is-primary" value="{{ __('admin.crear') }}" ></input>
	</form>

	<br/>

	@if($errors->any())
	<div class="notification is-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

@endsection("content")