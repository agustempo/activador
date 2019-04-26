<span><b>{{ $auditoria->usuario->nombreCompleto }}</b></span>
<span>{{ __('admin.creo_inscripcion') }}</span> 
<span> 
	@if ($auditoria->objeto)
		{{ $auditoria->objeto->usuario->nombreCompleto }}
	@endif
</span> 
<span class="has-text-grey-light" >{{ $auditoria->updated_at->diffForHumans() }}</span>