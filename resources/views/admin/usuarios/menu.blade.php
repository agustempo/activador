<div class="tabs is-toggle">
  <ul>
    <li><a href="{{ $usuario->path_admin() }}" >{{ __(('admin.detalle')) }}</a></li>
    <li><a href="{{ $usuario->path_admin() . '/inscripciones' }}" >{{ __(('admin.inscripciones')) }} </a></li>
    <li><a href="{{ $usuario->path_admin() . '/cv' }}" >{{ __(('admin.CV')) }} </a></li>
  </ul>
</div>