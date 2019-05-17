@extends ('layouts.home')

@section('content')
<section class="hero is-light" style="height: 212px">
    <div class="hero-body" style="display: flex; align-items: center; justify-content: center;">
        <h1 class="title" >¡Sumate!</h1>
    </div>
</section>

<div class="section">

    <div class="columns" style="flex-direction: column">
        <div class="column is-10 is-offset-1">

            @if(session('mensaje'))
            <div class="notification is-success">{{__('frontend.'.session('mensaje'))}}</div>
            @endif
                
            <h1 class="title" >{{ $actividad->nombre }}</h1>

            <div><span class="tag is-info" >#Tipo</span></div>

        </div>

        <div class="column is-10 is-offset-1">

            <h3 class="title is-5"><i class="icon fas fa-calendar-alt" ></i> Cuándo</h3>
            <div>{{ $actividad->fechas }} ({{ $actividad->duracion }})</div>

        </div>

        <div class="column is-10 is-offset-1">

            <h3 class="title is-5"><i class="icon fas fa-users" ></i> Organiza</h3>

            <div style="display: flex; align-items: baseline; flex-wrap: wrap;">

                <div class="" style="display: flex; flex-direction: column; width: fit-content;align-items: center; margin-right: 1rem">
                    <div class="image is-96x96" style="margin: .75rem 0 .75rem 0">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                    </div>
                    <p class="is-6">{{ $actividad->creador->nombre }}</p>
                </div>

                <div class="" style="display: flex; flex-direction: column; width: fit-content;align-items: center;  margin-right: 1rem">
                    <div class="image is-96x96" style="margin: .75rem 0 .75rem 0">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                    </div>
                    <p class="is-6">{{ $actividad->creador->nombre }}</p>
                </div>

                <div class="" style="display: flex; flex-direction: column; width: fit-content;align-items: center;  margin-right: 1rem">
                    <div class="image is-96x96" style="margin: .75rem 0 .75rem 0">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                    </div>
                    <p class="is-6">{{ $actividad->creador->nombre }}</p>
                </div>

            </div>

        </div>

        <div class="column is-10 is-offset-1">

            <h3 class="title is-5"><i class="icon fas fa-bullhorn" ></i> De qué se trata</h3>
            <p class="content">
                <p>{{ $actividad->descripcion }}</p>
            </p>

        </div>

        <div class="column is-10 is-offset-1">
                <h3 class="title is-5"><i class="icon fas fa-map-marker-alt"></i> Dónde</h3> 
                <div>{{ $actividad->lugar }}</div>
        </div>

        <div class="column" style="border-top: solid 1px #cecece; margin: 1rem 0;">
            <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                <div style="margin: 1rem 0;"><h3 class="title is-3">{{ $actividad->nombre }}</h3></div>
                <div class="buttons is-right">
                    <a class="button is-link is-inverted is-medium"><i class="fas fa-share-alt" ></i> {{ __('frontend.compartir') }}</a>
                    @if (Auth::check() && $actividad->esta_inscripto(auth()->user()))
                        <a class="button is-link is-outlined is-medium">{{ __('frontend.inscripto') }}</a>
                    @else
                        <form id="form-inscribirme" method="POST" action="/actividades/{{ $actividad->id }}/inscripciones" style="display: hidden;">
                        {{ csrf_field() }}
                        </form>
                        <a onclick="event.preventDefault();document.getElementById('form-inscribirme').submit();" 
                        class="button is-link is-medium has-text-weight-semibold">{{ __('frontend.inscribirme') }}</a>
                    @endif
                </div>
            </div>

            @if($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

        </div>

    </div>
</div>
@endsection('content')