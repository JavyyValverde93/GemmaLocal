<x-menu-grupos>
	<x-slot name="slot">
		<div align="center">Reserva Espacio</div>
		<form action="{{route('reservasespacios.create')}}" method="POST" class="ml-5 mt-4 border p-5">
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