<div class="tabs is-toggle">
  <ul>
    <li><a href="{{ $actividad->path_admin() }}" >General</a></li>
    <li><a>Puntos</a></li>
    <li><a href="{{ $actividad->path_admin() . '/inscripciones' }}" >Inscripciones</a></li> 
    <li><a>Grupos</a></li>
    <li><a>Evaluaciones</a></li>
    <li><a href="{{ $actividad->path_admin() . '/miembros' }}" >Accesos</a></li>
    <li><a href="{{ $actividad->path_admin() . '/auditoria' }}" >Auditoría</a></li>
  </ul>
</div>