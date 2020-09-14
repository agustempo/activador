<div class="tabs is-toggle">
  <ul>
    <li><a href="{{ $usuario->path_admin() }}" >{{ __(('admin.detalle')) }}</a></li>
    @if (auth()->user()->esAdmin()) 
    	<li><a href="{{ $usuario->path_admin() . '/inscripciones' }}" >{{ __(('admin.inscripciones')) }} </a></li>
    @endif
    <li><a href="{{ $usuario->path_admin() . '/cv' }}" >{{ __(('admin.CV')) }} </a></li>
  </ul>
</div>