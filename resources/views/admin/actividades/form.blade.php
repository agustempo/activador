
		{{ csrf_field() }}

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
			<label class="label">{{ __(('admin.inicio')) }}</label>
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
			<label class="label">{{ __(('admin.fin')) }}</label>
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