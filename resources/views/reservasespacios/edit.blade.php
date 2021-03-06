<x-menu-grupos>
	<x-slot name="slot">
		
		<script>
			navselected = 'espacio';
		</script>
		
	<div class="row migaspan">
      <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
    </div>
		<h5 class="text-center">Reserva Espacio</h5>
		<form action="{{route('reservasespacios.update', $reservaespacio)}}" method="POST" class="ml-5 mt-4 border p-5">
			@csrf
            @method('PUT')
			<div class="form-group">
				<label for="nombre" class="form-text">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$reservaespacio->nombre}}">
				<small>{{$errors->first('nombre')}}</small>
			</div>
			<div class="form-group">
				<label for="descripcion" class="form-text">Descripci&oacute;n</label>
				<input type="text" name="descripcion" class="form-control" value="{{$reservaespacio->descripcion}}">
				<small>{{$errors->first('descripcion')}}</small>
			</div>
			<button type="submit" name="Enviar" class="btn btn-danger">Modificar reserva</button>
		</form>

	</x-slot>
</x-menu-grupos>