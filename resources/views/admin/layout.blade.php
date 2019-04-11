<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <!--<link rel="stylesheet" href="/css/debug.css">-->
      

  </head>
  <body>

  <section class="section">
    <div class="container">

      <div class="level is-mobile">

        <div class="level-left">
          <figure class="image is-32x32">
              <img class="" src="https://bulma.io/images/placeholders/128x128.png">
          </figure>
          <div class="level-item">Activador</div>
        </div>
         <div class="level-right">
          <div class="level-item">Usuario
            <figure class="image is-32x32">
              <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
            </figure>
          </div>
        </div>

      </div>

    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="columns">

        <div class="column is-one-quarter">
          @include("admin.menu")
        </div>

        <div class="column">
          <h4 class="title is-4">{{ $actividad->nombre }}</h4>
          @include("admin.actividades.menu")
          @yield("content")
        </div>

      </div>
    </div>
  </section>


  <footer class="footer">
    <div class="container">

      Footer

    </div>
  </footer>

  </body>
</html>