<div class="tabs is-toggle">
  <ul>
    <li><a href="{{ $actividad->path_admin() }}" >{{ __(('admin.general')) }}</a></li>
    <li><a href="{{ $actividad->path_admin() . '/inscripciones' }}" >{{ __(('admin.inscripciones')) }} </a></li>
    <!-- 
    <li><a href="{{ $actividad->path_admin() . '/evaluaciones' }}" >{{ __(('admin.evaluaciones')) }} </a></li>
    <li><a href="{{ $actividad->path_admin() . '/invitaciones' }}" >{{ __(('admin.invitaciones')) }} </a></li>
    <li><a href="{{ $actividad->path_admin() . '/auditoria' }}" >{{ __(('admin.auditoria')) }} </a></li>
    <li><a>{{ __(('admin.puntos')) }} </a></li>
    <li><a>{{ __(('admin.grupos')) }} </a></li> -->
  </ul>
</div>