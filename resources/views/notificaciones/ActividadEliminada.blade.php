{{ __('notificaciones.se_elimino') }}
<a href="/actividades/{{ $notificacion->data['id'] }}">{{ $notificacion->data["nombre"] }}</a>
<span class="has-text-grey-light" >{{ $notificacion->updated_at->diffForHumans() }}</span>