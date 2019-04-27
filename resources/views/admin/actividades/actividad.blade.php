@extends("layouts.home")
	
@section('title')
{{ ucfirst($actividad->nombre) }}
@endsection('title')

@section('content')
<div class="section">

	<h4 class="title is-4">{{ ucfirst($actividad->nombre) }}</h4>
	
	@include("admin.actividades.menu")

	@yield('contenido-actividad')

</div>
@endsection('content')