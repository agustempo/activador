<span><b>{{ $auditoria->usuario->nombreCompleto }}</b></span>
@if($auditoria->objeto && $auditoria->usuario == $auditoria->objeto->usuario)
<span>{{ __('admin.se_inscribio') }}</span> 
@else
<span>{{ __('admin.creo_inscripcion') }}</span> 
<span> 
	@if ($auditoria->objeto)
		{{ $auditoria->objeto->usuario->nombreCompleto }}
	@endif
</span> 
@endif

<span class="has-text-grey-light" >{{ $auditoria->updated_at->diffForHumans() }}</span>