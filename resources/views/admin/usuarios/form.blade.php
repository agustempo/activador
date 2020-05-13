
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
			<label class="label">{{ __(('admin.password')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('password') ? 'is-danger' : '' }}" 
					name="password" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($usuario->password)?$usuario->password:old('password')}}"></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('admin.email_verified_at')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('email_verified_at') ? 'is-danger' : '' }}" 
					type="datetime-local" 
					name="email_verified_at" 
					value="{{ ($usuario->email_verified_at)?$usuario->finDatetimeLocal:old('email_verified_at')}}" 
					{{ ($deshabilitado)?"disabled":"" }}></input>
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

		@if($errors->any())
		<div class="notification is-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif