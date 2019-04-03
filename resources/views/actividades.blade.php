    
    <h1 class="title" >{{ __('admin.listado_de') }} {{ __('actividades.actividades') }}</h1>
    <ul>
    @foreach ($actividades as $actividad)

        <div>
            <a href="/actividades/{{ $actividad->id }}">{{ $actividad->nombre }}</a> 
            
            <p>
                Cuándo: {{ $actividad->cuando }} 

                (@if($actividad->duracionEnDias>0) 
                    {{ $actividad->duracionEnDias }} {{__('actividades.dias')}}
                @else
                    {{ $actividad->duracionEnHoras }} {{__('actividades.horas')}}
                @endif)
            </p>

            <p>Dónde: {{ $actividad->lugar }}</p>

            <p>Qué/Cómo: {{ $actividad->resumen }}</p>

            <p>Quién: {{ $actividad->creador->nombre }}</p>

        </div>

    @endforeach
    </ul>