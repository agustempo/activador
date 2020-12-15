@extends("layouts.home")
	
@section('title')
{{ ucfirst($actividad->nombre) }}
@endsection('title')

@section('content')
<div class="section">
	
	<div class="content">
		<div class="columns is-centered">
	        <figure class="image is-128x128">
				<img class="is-rounded" src="/storage/foto/{{ $actividad->foto }}">
			</figure>
	        <h3>{{ $actividad->nombre }}</h3>
      	</div>
    </div>

	<div class="columns">

		<div class="column is-8 is-offset-2">
	
	@include("admin.actividades.menu")

	@yield('contenido-actividad')

</div>
</div>
</div>
@endsection('content')