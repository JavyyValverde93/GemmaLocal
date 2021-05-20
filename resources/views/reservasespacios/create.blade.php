<x-menu-grupos>
	<x-slot name="slot">
	<div class="row migaspan">
      <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
      <a href="{{route('reservasespacios.create')}}" class="text-danger">Reservar Espacios</a> >
    </div>
		<form action="{{route('reservasespacios.create')}}" method="POST" class="mt-4 border p-5">
			@csrf
			<div class="form-group">
				<label for="nombre" class="form-text">Nombre</label>
				<input type="text" name="nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="descripcion" class="form-text">Descripci&oacute;n</label>
				<input type="text" name="descripcion" class="form-control">
			</div>
			<input type="submit" name="Enviar" class="btn btn-danger">
		</form>

	</x-slot>
</x-menu-grupos>