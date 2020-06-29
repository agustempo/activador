@extends("layouts.home")
	
@section('title')
{{ ucfirst($actividad->nombre) }}
@endsection('title')

@section('content')
<div class="section">

	<div class="columns">

		<div class="column is-8 is-offset-2">

	<h4 class="title is-4">{{ ucfirst($actividad->nombre) }}</h4>
	
	@include("admin.actividades.menu")

	@yield('contenido-actividad')

</div>
</div>
</div>
@endsection('content')