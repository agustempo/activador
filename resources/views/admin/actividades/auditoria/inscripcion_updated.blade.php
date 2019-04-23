<span>{{ $auditoria->usuario->nombre }}</span> 
<span>{{__(('admin.edito_incripcion'))}}</span> 
<span>
	@foreach ($auditoria->cambios['antes'] as $atributo => $valor)
	    {{ $atributo }}: {{ $valor }}
	@endforeach
	@foreach ($auditoria->cambios['despues'] as $atributo => $valor)
	    {{ $atributo }}: {{ $valor }}
	@endforeach
</span> 
<span>{{ $auditoria->updated_at->diffForHumans() }}</span>