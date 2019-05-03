{{ __('notificaciones.te_inscribiste') }}
<a href="/actividades/{{ $notificacion->data['id'] }}">{{ $notificacion->data["nombre"] }}</a>
{{ __('notificaciones.accede_a_inscripciones') }}
<a href="/inscripciones">{{ __('notificaciones.aca') }}</a>
<span class="has-text-grey-light" >{{ $notificacion->updated_at->diffForHumans() }}</span>