@extends ('layouts.home')

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <h1 class="title" >Explorá las actividades</h1>
    </div>
</section>

<div class="section">
    <div class="columns is-multiline">
        @foreach ($actividades as $actividad)
        <div class="column is-one-quarter">
            
            <div class="card">
                <header class="card-header">
                    <div class="card-header-title">
                        <p class="title is-4">{{ $actividad->nombre }}</p>
                    </div>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div>
                            #Tipo
                        </div>
                        <div>
                            <span class="icon">
                                <i class="fas fa-calendar-minus" ></i><time datetime="2016-1-1"></time>
                            </span>
                            <span>{{ $actividad->cuando }}</span>
                        </div>
                        <div>
                            <span class="icon">
                                <i class="fas fa-map-marker-alt" ></i>
                            </span>
                            <span>{{ $actividad->lugar }}</span>
                        </div>

                        <div class="media">
                          <div class="media-left">
                            <div class="image is-24x24">
                              <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </div>
                          </div>
                          <div class="media-content">
                            <p class="">{{ $actividad->creador->nombre }}</p>
                          </div>
                        </div> 

                        <p>{{ $actividad->resumen }}</p>
                    </div>
                </div>

                <footer class="card-footer">
                    @if (Auth::check() && $actividad->esta_inscripto(auth()->user()))
                        <a class="card-footer-item">{{ __('frontend.inscripto')}}</a>
                    @else
                        <a href="/actividades/{{ $actividad->id }}" class="card-footer-item">{{ __('frontend.inscribirme')}}</a>
                    @endif
                </footer>
                
            </div>
        
        </div>
        @endforeach
    </div>
</div>

@endsection('content')