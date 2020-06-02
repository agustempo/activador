
		{{ csrf_field() }}

		<div class="field">
			<label class="label">{{ __(('admin.nombre')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" 
				type="text" name="nombre" value="{{ ($usuario->nombre)?$usuario->nombre:old('nombre') }}"  
				{{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.apellido')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('apellido') ? 'is-danger' : '' }}" 
					name="apellido" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->apellido)?$usuario->apellido:old('apellido')}}"></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.telefono')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('telefono') ? 'is-danger' : '' }}" 
					name="telefono" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->telefono)?$usuario->telefono:old('telefono')}}"></input>
			</div>
		</div>
		
		<div class="field">
			<label class="label">{{ __(('admin.email')) }}</label>
	  		<div class="control">
				<input 
				class="input {{ $errors->has('email') ? 'is-danger' : '' }}" 
				type="text" 
				name="email" 
				value="{{ ($usuario->email)?$usuario->email:old('email')}}" 
				{{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>


		<div class="field">
			<label class="label">{{ __(('admin.cohorte')) }}</label>
	  		<div class="select is-fullwidth">
				<select class="{{ $errors->has('cohorte') ? 'is-danger' : '' }}" name="cohorte" {{ ($deshabilitado)?"disabled":"" }}>
  					<option value="2011" {{ (($usuario->cohorte)?$usuario->cohorte:old('cohorte')) == 2011 ? 'selected' : '' }}>2011</option> 
  					<option value="2012" {{ (($usuario->cohorte)?$usuario->cohorte:old('cohorte')) == 2012 ? 'selected' : '' }}>2012</option>
  					<option value="2013" {{ (($usuario->cohorte)?$usuario->cohorte:old('cohorte')) == 2013 ? 'selected' : '' }}>2013</option>
				</select>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.region')) }}</label>
	  		<div class="select is-fullwidth">
				<select name="región" {{ ($deshabilitado)?"disabled":"" }}>
  					<option value="Buenos Aires" {{ (($usuario->región)?$usuario->región:old('región')) == "Buenos Aires" ? 'selected' : '' }}>Buenos Aires</option> 
  					<option value="Salta" {{ (($usuario->región)?$usuario->región:old('región')) == "Salta" ? 'selected' : '' }}>Salta</option> 
  					<option value="Córdoba" {{ (($usuario->región)?$usuario->región:old('región')) == "Córdoba" ? 'selected' : '' }}>Córdoba</option> 
				</select>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.carrera')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('carrera') ? 'is-danger' : '' }}" 
					name="carrera" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->carrera)?$usuario->carrera:old('carrera')}}"></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.lugar_trabajo')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('lugar_trabajo') ? 'is-danger' : '' }}" 
					name="lugar_trabajo" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->lugar_trabajo)?$usuario->lugar_trabajo:old('lugar_trabajo')}}"></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.rol_trabajo')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('rol_trabajo') ? 'is-danger' : '' }}" 
					name="rol_trabajo" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->rol_trabajo)?$usuario->rol_trabajo:old('rol_trabajo')}}"></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.trayectoria')) }}</label>
	  		<div class="select is-fullwidth">
				<select name="trayectoria" {{ ($deshabilitado)?"disabled":"" }}>
  					<option value="Innovación Social" {{ (($usuario->trayectoria)?$usuario->trayectoria:old('trayectoria')) == "Innovación Social" ? 'selected' : '' }}>Innovación Social</option> 
  					<option value="Sector Privado" {{ (($usuario->trayectoria)?$usuario->trayectoria:old('trayectoria')) == "Sector Privado" ? 'selected' : '' }}>Sector Privado</option>
  					<option value="Docencia" {{ (($usuario->trayectoria)?$usuario->trayectoria:old('trayectoria')) == "Docencia" ? 'selected' : '' }}>Docencia</option>
  					<option value="Liderazgo Educativo" {{ (($usuario->trayectoria)?$usuario->trayectoria:old('trayectoria')) == "Liderazgo Educativo" ? 'selected' : '' }}>Liderazgo Educativo</option>
  					<option value="Política Pública" {{ (($usuario->trayectoria)?$usuario->trayectoria:old('trayectoria')) == "Política Pública" ? 'selected' : '' }}>Política Pública</option>
				</select>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.reseña')) }}</label>
	  		<div class="control">
				<textarea 
					class="textarea {{ $errors->has('reseña') ? 'is-danger' : '' }}" 
					name="reseña" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->reseña)?$usuario->reseña:old('reseña')}}">{{ ($usuario->reseña)?$usuario->reseña:old('reseña')}}
				</textarea>
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