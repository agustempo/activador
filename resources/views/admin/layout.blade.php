<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="/css/activador.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <!--<link rel="stylesheet" href="/css/debug.css">-->
  </head>
  <body>

    <nav class="navbar is-light" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">

        <a class="navbar-item" href="/">
          <img src="/images/logo.svg" >
          <span>Activador</span>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu">
        <div class="navbar-start">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Actividades
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item" href="/admin/actividades/create" >
                Crear nueva
              </a>
              <a class="navbar-item" href="/admin/actividades" >
                Mías
              </a>
              <a class="navbar-item">
                Compartidas conmigo
              </a>
              <a class="navbar-item">
                Donde coordindo
              </a>
              <hr class="navbar-divider">
              <div class="navbar-item">
                Todas
              </div>
            </div>
          </div>

          <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Usuarios
              </a>
              <div class="navbar-dropdown">
                <a class="navbar-item">
                    Administrar
                </a>
              </div>
          </div>

          <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Sitio
              </a>
              <div class="navbar-dropdown">
                <a class="navbar-item">
                    General
                </a>
              </div>
          </div>

        </div>

        <div class="navbar-end">
          <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                {{ auth()->user()->nombreCompleto }}
              </a>
              <div class="navbar-dropdown">
                <a class="navbar-item" href="/login" >
                    {{ __(('admin.login')) }}
                </a>
                <a class="navbar-item" href="/logout" 
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                    <form id="logout-form" method="POST" action="/logout" style="display:none">{{ csrf_field() }}</form>
                    {{ __(('admin.logout')) }}
                </a>
              </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
        @yield("content")
    </div> 
    

    <footer class="footer">
      <div class="content has-text-centered">
        <p>
          <strong>Activador</strong> by <a href="http://www.techo.org">TECHO</a>. El código tiene licencia GPL. El contenido tiene licencia CC BY NC SA 4.
        </p>
      </div>
    </footer>

  </body>
</html>