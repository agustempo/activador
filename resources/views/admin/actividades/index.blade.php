@extends('layouts.home')

@section('title')
{{ __('admin.listado_de') }} 
@if($tipo == 1) 
	{{ __('admin.actividades') }} 
@else 
	{{ __('admin.mentorias') }}
@endif
@endsection('title')

@section('content')
<div class="section">
	<div class="content">
		<p><a href="/admin/actividades/create" class="button is-primary" >{{ __('admin.nueva') }}</a></p>

		@if($tipo == 1)
			<h4>{{ __('admin.listado_de') }}  {{ __('admin.actividades') }} </h4>
		@else
			<h4>{{ __('admin.listado_de') }}  {{ __('admin.mentorias') }} </h4>
	
		@endif

		<div class="flex-center position-ref full-height" id="app">
			<data-table
				fetch-url="/admin/ajax/actividades/tipo/{{ $tipo }}"
				:columns="['id', 'nombre', 'organizacion' , 'fin', 'lugar']"
				:view-url="'/admin/actividades/'"
			></data-table>
		</div>

	</div>
</div>
@endsection('content')