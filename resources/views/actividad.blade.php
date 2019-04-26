@extends ('layouts.home')

@section('content')
<div class="section">
    <h1 class="title" >{{ __('actividades.actividad') }} {{ $actividad->nombre }}</h1>

    <p>
            Cuándo: {{ $actividad->cuando }} 

            (@if($actividad->duracionEnDias>0) 
                {{ $actividad->duracionEnDias }} {{__('actividades.dias')}}
            @else
                {{ $actividad->duracionEnHoras }} {{__('actividades.horas')}}
            @endif)
        </p>

        <p>Dónde: {{ $actividad->lugar }}</p>

        <p>Quién: {{ $actividad->creador->nombreCompleto }}</p>

</div>
<div class="section">
    <p class="content">
        {{ $actividad->descripcion }}
    </p>
</div>
<div class="section">
    <form id="form-inscribirme" method="POST" action="/actividades/{{ $actividad->id }}/inscripciones" >
        {{ csrf_field() }}
    </form>
    <a onclick="event.preventDefault();document.getElementById('form-inscribirme').submit();" class="button">Inscribirme</a>

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