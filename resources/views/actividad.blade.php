@extends ('layouts.home')

@section('content')
<div class="section">
    
    <h1 class="title" >{{ $actividad->nombre }}</h1>
    
    <div class="columns" style="flex-direction: column">
        <div class="column">
            <div class="level" style="justify-content: initial;">
                <div class="level-right" style="margin-right: .5em" >
                    <i class="icon fas fa-calendar-alt" style="margin-right: .5em;"></i> {{ $actividad->cuando }} 

                    ({{ $actividad->duracion }})
                </div>
                <div class="level-left" >
                    <i class="icon fas fa-map-marker-alt" style="margin-right: .5em;"></i> {{ $actividad->lugar }}
                </div>
            </div>
        </div>
        <div class="column">
            <div class="box" style="display: flex; align-items: center; width: fit-content;">
                <div class="image is-48x48" style="margin-right: .75em">
                    <img class="is-rounded" style="min-height: 48px;" src="https://bulma.io/images/placeholders/128x128.png">
                </div>
                <p class="title is-6">{{ $actividad->creador->nombre }}</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <p class="content">
        {{ $actividad->descripcion }}
    </p>
</div>
<div class="section">
    <div class="buttons is-right">
        <div class="button">{{ __('frontend.compartir') }}</div>
        @if (Auth::check() && $actividad->esta_inscripto(auth()->user()))
            <a class="button is-link is-outlined">{{ __('frontend.inscripto') }}</a>
        @else
            <form id="form-inscribirme" method="POST" action="/actividades/{{ $actividad->id }}/inscripciones" >
            {{ csrf_field() }}
            </form>
            <a onclick="event.preventDefault();document.getElementById('form-inscribirme').submit();" 
            class="button is-link">{{ __('frontend.inscribirme') }}</a>
        @endif
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

    @if(session('mensaje'))
        <div class="notification is-success">{{__('frontend.'.session('mensaje'))}}</div>
    @endif
</div>
@endsection('content')