<span><b>{{ $auditoria->usuario->nombreCompleto }}</b></span>
<span>{{__(('admin.edito_inscripcion'))}}</span> 
<span>
	{
	@foreach ($auditoria->cambios['antes'] as $atributo => $valor)
	    <b>{{ $atributo }}</b>: {{ $valor }}
	@endforeach
	@foreach ($auditoria->cambios['despues'] as $atributo => $valor)
	    <b>{{ $atributo }}</b>: {{ $valor }}
	@endforeach
	}
</span>  
<span class="has-text-grey-light" >{{ $auditoria->updated_at->diffForHumans() }}</span>