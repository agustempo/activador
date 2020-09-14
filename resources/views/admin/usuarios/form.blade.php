
		{{ csrf_field() }}
    <div class="container">
      <h1 class="title">Perfil</h1>
		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.nombre')) }}</label>
			  		<div class="control">
						<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" 
						type="text" name="nombre" value="{{ ($usuario->nombre)?$usuario->nombre:old('nombre') }}"  
						{{ ($deshabilitado)?"disabled":"" }}></input>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="field">
				<label class="label">{{ __(('admin.apellido')) }}</label>
		  		<div class="control">
					<input 
						class="input {{ $errors->has('apellido') ? 'is-danger' : '' }}" 
						name="apellido" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->apellido)?$usuario->apellido:old('apellido')}}"></input>
				</div>
				</div>
			</div>
		</div>

		<div class="columns">

			<div class="column">
				<div class="field">
				<label class="label">{{ __(('admin.telefono')) }}</label>
		  		<div class="control">
					<input 
						class="input {{ $errors->has('telefono') ? 'is-danger' : '' }}" 
						name="telefono" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->telefono)?$usuario->telefono:old('telefono')}}"></input>
				</div>
				</div>
			</div>
		
			<div class="column">
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
			</div>
		</div>

		<div class="columns">

			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.provincia')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('provincia') ? 'is-danger' : '' }}" 
							name="provincia" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->provincia)?$usuario->provincia:old('provincia')}}"></input>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.pais')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('pais') ? 'is-danger' : '' }}" 
							name="pais" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->pais)?$usuario->pais:old('pais')}}"></input>
					</div>
				</div>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.reseña')) }}</label>
	  		<div class="control">
				<textarea 
					class="textarea {{ $errors->has('reseña') ? 'is-danger' : '' }}" 
					name="reseña" {{ ($deshabilitado)?"disabled":"" }} >{{ ($usuario->reseña)?$usuario->reseña:old('reseña')}}</textarea>
			</div>
		</div>
	 	
	</div>



    <div class="container"><br>
      <h1 class="title">Datos Profesionales</h1> 

		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.carrera')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('carrera') ? 'is-danger' : '' }}" 
							name="carrera" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->carrera)?$usuario->carrera:old('carrera')}}"></input>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.universidad')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('universidad') ? 'is-danger' : '' }}" 
							name="universidad" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->universidad)?$usuario->universidad:old('universidad')}}"></input>
					</div>
				</div>
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

		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.rol_trabajo')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('rol_trabajo') ? 'is-danger' : '' }}" 
							name="rol_trabajo" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->rol_trabajo)?$usuario->rol_trabajo:old('rol_trabajo')}}"></input>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.intereses')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('intereses') ? 'is-danger' : '' }}" 
							name="intereses" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->intereses)?$usuario->intereses:old('intereses')}}"></input>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<br>
      	<h1 class="title">Trayectoria Enseña</h1> 
		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.programa')) }}</label>
			  		<div class="select is-fullwidth">
						<select name="programa" {{ ($deshabilitado)?"disabled":"" }}>
		  					<option value="AMBA" {{ (($usuario->programa)?$usuario->programa:old('programa')) == "AMBA" ? 'selected' : '' }}>AMBA</option> 
		  					<option value="Co-Docencia" {{ (($usuario->programa)?$usuario->programa:old('programa')) == "Co-Docencia" ? 'selected' : '' }}>Co-Docencia</option> 
		  					<option value="Jornada Extendida" {{ (($usuario->programa)?$usuario->programa:old('programa')) == "Jornada Extendida" ? 'selected' : '' }}>Jornada Extendida</option> 
						</select>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.cohorte')) }}</label>
			  		<div class="select is-fullwidth">
						<select class="{{ $errors->has('cohorte') ? 'is-danger' : '' }}" name="cohorte" {{ ($deshabilitado)?"disabled":"" }}>
							@for ($i = 2011; $i < 2021; $i++)
								<option value="{{ $i }}" {{ (($usuario->cohorte)?$usuario->cohorte:old('cohorte')) == $i ? 'selected' : '' }}>{{ $i }}</option>
							@endfor
						</select>
					</div>
				</div>
			</div>

			

			<div class="column">
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
			</div>

            @if (auth()->user()->esAdmin()) 
				<div class="column">
					<div class="field">
						<label class="label">{{ __(('admin.rol')) }}</label>
				  		<div class="select is-fullwidth">
							<select class="{{ $errors->has('rol') ? 'is-danger' : '' }}" name="rol" {{ ($deshabilitado)?"disabled":"" }}>
			  					<option value="user" {{ (($usuario->rol)?$usuario->rol:old('rol')) == 'user' ? 'selected' : '' }}>user</option>
			  					<option value="admin" {{ (($usuario->rol)?$usuario->rol:old('rol')) == 'admin' ? 'selected' : '' }}>admin</option> 
			  					
							</select>
						</div>
					</div>
				</div>
			@endif
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
	</div>

    <div class="container"><br>
	    <h1 class="title">Redes Sociales</h1> 
		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.facebook')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('facebook') ? 'is-danger' : '' }}" 
							name="facebook" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->facebook)?$usuario->facebook:old('facebook')}}"></input>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.instagram')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('instagram') ? 'is-danger' : '' }}" 
							name="instagram" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->instagram)?$usuario->instagram:old('instagram')}}"></input>
					</div>
				</div>
			</div>


			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.twitter')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('twitter') ? 'is-danger' : '' }}" 
							name="twitter" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->twitter)?$usuario->twitter:old('twitter')}}"></input>
					</div>
				</div>
			</div>
		

		
			<div class="column">
				<div class="field">
					<label class="label">{{ __(('admin.linkedin')) }}</label>
			  		<div class="control">
						<input 
							class="input {{ $errors->has('linkedin') ? 'is-danger' : '' }}" 
							name="linkedin" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->linkedin)?$usuario->linkedin:old('linkedin')}}"></input>
					</div>
				</div>
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

