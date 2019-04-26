
		{{ csrf_field() }}

		<div class="field">
			<label class="label">Nombre</label>
	  		<div class="control">
				<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" type="text" name="nombre" value="{{ ($actividad->nombre)?$actividad->nombre:old('nombre')}}"  {{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Descripción</label>
	  		<div class="control">
				<textarea 
					class="textarea {{ $errors->has('descripcion') ? 'is-danger' : '' }}" 
					name="descripcion" {{ ($deshabilitado)?"disabled":"" }}>{{ ($actividad->descripcion)?$actividad->descripcion:old('descripcion')}}</textarea>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.inicio')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('inicio') ? 'is-danger' : '' }}" 
					type="datetime-local" 
					name="inicio" 
					value="{{ ($actividad->inicio)?$actividad->finDatetimeLocal:old('inicio')}}" 
					{{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.fin')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('fin') ? 'is-danger' : '' }}" 
					type="datetime-local" 
					name="fin" 
					value="{{ ($actividad->fin)?$actividad->finDatetimeLocal:old('fin')}}" 
					{{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.lugar')) }}</label>
	  		<div class="control">
				<input 
				class="input {{ $errors->has('lugar') ? 'is-danger' : '' }}" 
				type="text" 
				name="lugar" 
				value="{{ ($actividad->lugar)?$actividad->lugar:old('lugar')}}" 
				{{ ($deshabilitado)?"disabled":"" }}></input>
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