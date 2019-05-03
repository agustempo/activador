@extends ('layouts.home')

@section('content')
<div class="section">
    
    @if(session('mensaje'))
        <div class="notification is-success">{{__('frontend.'.session('mensaje'))}}</div>
    @endif

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">

            <h1 class="title is-4" >{{ __('frontend.evaluar') }}: {{ $actividad->nombre }}</h1>

            <div class="content">
                <p>{{ __('frontend.evaluar_bajada') }}</p>
            </div>

            <form id="form-evaluar" method="POST" action="/actividades/{{ $actividad->id }}/evaluaciones/{{ optional($evaluacion)->id }}">
                @csrf
                @if ($evaluacion)
                   {{ method_field('PATCH') }}
                @endif
                <div class="field">
                    <label class="label">{{ __(('frontend.puntaje')) }}</label>
                    <div class="control has-icons-left">
                        <div class="select">
                          <select name="puntaje">
                            <option value="" disabled selected >{{ __(('frontend.placeholder_puntaje')) }}</option>
                            @for ($i = 1; $i <= 10; $i++)
                                @if(old('puntaje') == $i or optional($evaluacion)->puntaje == $i)
                                    <option value="{{$i}}" selected >{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                          </select>
                        </div>
                        <span class="icon is-left">
                            <i class="fas fa-ruler"></i>
                        </span>
                    </div>
                    <p class="help">{{ __(('frontend.ayuda_puntaje')) }}</p>
                </div>

                <div class="field">
                    <label class="label">{{ __(('frontend.comentario')) }}</label>
                    <div class="control">
                        <textarea 
                            class="textarea" 
                            name="comentario" 
                            placeholder="{{ __(('frontend.placeholder_comentario')) }}"
                            >{{ old('comentario', optional($evaluacion)->comentario) }}</textarea>
                    </div>
                    <p class="help">{{ __(('frontend.ayuda_comentario')) }}</p>
                </div>

                <div class="field">
                    <div class="buttons is-right">
                        <button onclick="event.preventDefault();document.getElementById('form-evaluar').submit();" 
                            class="button is-link">
                            @if ($actividad->evaluaciones()->exists())
                                {{ __('frontend.editar') }}
                            @else
                                {{ __('frontend.evaluar') }}
                            @endif
                        </button>
                    </div>
                </div>  
            </form>

            @if ($actividad->evaluaciones()->exists())
            <form method="POST" action="/actividades/{{ $actividad->id }}/evaluaciones/{{ optional($evaluacion)->id }}">
                @csrf
                @if ($actividad->evaluaciones()->exists())
                   {{ method_field('DELETE') }}
                @endif
                <div class="field">
                    <div class="buttons is-right">
                        <button class="button is-danger">{{ __('frontend.eliminar') }}</button>
                    </div>
                </div>
            </form>
            @endif

            <br>

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

@endsection('content')