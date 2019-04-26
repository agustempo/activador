<span><b>{{ $auditoria->usuario->nombreCompleto }}</b></span>
<span>{{__(('admin.elimino_inscripcion'))}}</span> 
<span class="has-text-grey-light" >{{ $auditoria->updated_at->diffForHumans() }}</span>