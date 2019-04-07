
		{{ csrf_field() }}

		<div class="field">
			<label class="label">Nombre</label>
	  		<div class="control">
				<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" type="text" name="nombre" value="{{ $actividad->nombre }}"  {{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>
		<div class="field">
			<label class="label">Descripción</label>
	  		<div class="control">
				<textarea 
					class="textarea {{ $errors->has('descripcion') ? 'is-danger' : '' }}" 
					name="descripcion" {{ ($deshabilitado)?"disabled":"" }}>{{ $actividad->descripcion }}</textarea>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('actividades.fecha_inicio')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('fecha_inicio') ? 'is-danger' : '' }}" type="date" name="fecha_inicio" value="{{ $actividad->inicio }}" {{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.fecha_fin')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('fecha_fin') ? 'is-danger' : '' }}" type="date" name="fecha_fin" value="{{ $actividad->fin }}" {{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('actividades.lugar')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('lugar') ? 'is-danger' : '' }}" type="text" name="lugar" value="{{ $actividad->lugar }}" {{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>