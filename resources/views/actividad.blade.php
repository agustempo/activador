<h1 class="title" >{{ __('actividades.actividad') }} {{ $actividad->nombre }}</h1>

<div>
   
    <p>
        Cuándo: {{ $actividad->cuando }} 

        (@if($actividad->duracionEnDias>0) 
            {{ $actividad->duracionEnDias }} {{__('actividades.dias')}}
        @else
            {{ $actividad->duracionEnHoras }} {{__('actividades.horas')}}
        @endif)
    </p>

    <p>Dónde: {{ $actividad->lugar }}</p>

    <p>Qué/Cómo: {{ $actividad->descripcion }}</p>

    <p>Quién: {{ $actividad->creador->nombreCompleto }}</p>

</div>