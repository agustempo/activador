@extends('admin.layout')

@section('title')
{{ __('admin.listado_de') }} {{ __('tipos.tipos') }}
@endsection('title')

@section('content')
	<a href="/admin/tipos/create" class="button is-primary" >{{ __('admin.nuevo') }}</a>

	<h1 class="title" >{{ __('admin.listado_de') }} {{ __('tipos.tipos') }}</h1>

	<ul>
	@foreach ($tipos as $tipo)

		<li><a href="/admin/tipos/{{ $tipo->id }}">{{ $tipo->nombre }}</a></li>

	@endforeach
	</ul>
@endsection('content')