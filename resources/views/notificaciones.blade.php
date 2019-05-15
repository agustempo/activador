@extends('layouts.home')

@section('title')
{{ __('frontend.mis_notificaciones') }}
@endsection('title')
 
@section('content')
<div class="section content">
	<h3 class="title is-4">{{ __('frontend.mis_notificaciones') }}</h3>
	<ul>
	@forelse (auth()->user()->notifications as $notificacion)
	<li>
		@include ("notificaciones." . class_basename($notificacion->type))
   	</li>
   	@empty
   		<li>{{ __('frontend.no_hay_notificaciones') }}</li>
	@endforelse
	</ul>
</div>
@endsection('content')