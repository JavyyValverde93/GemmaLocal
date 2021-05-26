<x-menu-grupos>
	<x-slot name="slot">
		<h1 class="text-center">Roles</h1>
		<form action="{{route('roles.store')}}" method="POST" class="ml-5 mt-4 border p-5">
			@csrf 
			<div class="form-group">
				<label for="nombre" class="form-text">Nombre</label>
				<input type="text" name="nombre" class="form-control">
			</div>
			<button type="submit" class="btn btn-danger">Enviar</button>
		</form>
	</x-slot>
</x-menu-grupos>