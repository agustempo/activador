
		{{ csrf_field() }}

		@if(!$deshabilitado)


			<div class="field">
				<label class="label">{{ __(('admin.foto_actividad')) }}</label>
		  		<div class="control">

			    							<input class="input {{ $errors->has('foto') ? 'is-danger' : '' }}" 
					type="file" name="foto" placeholder="{{ ($actividad->foto)?$actividad->foto:old('foto') }}"  
					{{ ($deshabilitado)?"disabled":"" }}></input>

				</div>
			</div>
	
		@endif

		<div class="field">
			<label class="label">{{ __(('admin.tipo')) }}</label>
			<div class="select  is-fullwidth">
						<select name="tipo" {{ ($deshabilitado)?"disabled":"" }}>
		  					<option value="1" {{ (($actividad->tipo)?$actividad->tipo:old('tipo')) == "1" ? 'selected' : '' }}>{{ __(('admin.pasantia')) }}</option> 
		  					<option value="2" {{ (($actividad->tipo)?$actividad->tipo:old('tipo')) == "2" ? 'selected' : '' }}>{{ __(('admin.mentoria')) }}</option> 
						</select>
					</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.nombre')) }}</label>
	  		<div class="control">
				<input class="input {{ $errors->has('nombre') ? 'is-danger' : '' }}" type="text" name="nombre" value="{{ ($actividad->nombre)?$actividad->nombre:old('nombre')}}"  {{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>
		<div class="field">
			<label class="label">{{ __(('admin.organizacion')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('organizacion') ? 'is-danger' : '' }}" 
					name="organizacion" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($actividad->organizacion)?$actividad->organizacion:old('organizacion')}}">
				</input>
			</div>
		</div>

		

		<!-- <div class="field">
			<label class="label">{{ __(('admin.descripcion')) }}</label>
	  		<div class="control">
				<textarea 
					class="textarea {{ $errors->has('descripcion') ? 'is-danger' : '' }}" 
					name="descripcion" {{ ($deshabilitado)?"disabled":"" }}>{{ ($actividad->descripcion)?$actividad->descripcion:old('descripcion')}}</textarea>
			</div>
		</div> -->

		<!-- Include stylesheet -->
		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

		<div class="field">
			<label class="label">{{ __(('admin.descripcion')) }}</label>
			<input name="descripcion" type="hidden">
			@if($deshabilitado == 'disabled')
				{!! ($actividad->descripcion)?$actividad->descripcion:old('descripcion') !!}
			@else
	  		<div id="editor">
		  		{!! ($actividad->descripcion)?$actividad->descripcion:old('descripcion') !!}
			</div>
			@endif	
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.cupo')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('cupo') ? 'is-danger' : '' }}" 
					name="cupo" {{ ($deshabilitado)?"disabled":"" }} value="{{ ($actividad->cupo)?$actividad->cupo:old('cupo')}}">
				</input>
			</div>
		</div>



		<div class="field">
			<label class="label">{{ __(('admin.inicio')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('inicio') ? 'is-danger' : '' }}" 
					type="date" 
					name="inicio" 
					value="{{ ($actividad->inicio)?$actividad->finDatetimeLocal:old('inicio')}}" 
					{{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.fin')) }}</label>
	  		<div class="control">
				<input 
					class="input {{ $errors->has('fin') ? 'is-danger' : '' }}" 
					type="date" 
					name="fin" 
					value="{{ ($actividad->fin)?$actividad->finDatetimeLocal:old('fin')}}" 
					{{ ($deshabilitado)?"disabled":"" }}></input>
			</div>
		</div>

		<div class="field">
			<label class="label">{{ __(('admin.lugar')) }}</label>
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

		<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
	  // var deshabilitado = {!! $deshabilitado !!};
	  // if ( deshabilitado  == "disabled")
	  // 	quill.enabled();
	  // else
	  // 	quill.enabled();

</script>