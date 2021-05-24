<x-menu-grupos>
	<x-slot name="slot">
	<div class="row migaspan">
      <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
    </div>
	<h5 class="text-center">Reservar Espacios</h5>
	<script>
		navselected = 'espacio';
	</script>
		<form action="{{route('reservasespacios.create')}}" method="POST" class="mt-4 border p-5">
			@csrf
			<div class="form-group">
				<label for="nombre" class="form-text">Nombre</label>
				<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control">
				<small>{{$errors->first('nombre')}}</small>
			</div>
			<div class="form-group">
				<label for="descripcion" class="form-text">Descripci&oacute;n</label>
				<input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control">
				<small>{{$errors->first('descripcion')}}</small>
			</div>
			<button type="submit" name="Enviar" class="btn btn-danger">Reservar Espacio</button>
		</form>

	</x-slot>
</x-menu-grupos>