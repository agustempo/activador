<div class="tabs is-toggle">
  <ul>
    <li><a href="{{ $actividad->path_admin() }}" >General</a></li>
    <li><a href="{{ $actividad->path_admin() . '/inscripciones' }}" >Inscripciones</a></li>
    <li><a href="{{ $actividad->path_admin() . '/evaluaciones' }}" >Evaluaciones</a></li>
    <li><a href="{{ $actividad->path_admin() . '/invitaciones' }}" >Accesos</a></li>
    <li><a href="{{ $actividad->path_admin() . '/auditoria' }}" >Auditoría</a></li>
    <li><a>Puntos</a></li>
    <li><a>Grupos</a></li>
  </ul>
</div>