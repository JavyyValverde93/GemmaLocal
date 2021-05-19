<x-menu-grupos>
	<x-slot name="slot">
		<h1 class="text-center">Salario</h1>
		<form class="ml-5 mt-4 border p-5">
			<div class="form-group">
				<label for="total_mes" class="form-text">Total mes</label>
				<input type="number" name="total_mes" step="0.01" class="form-control">
			</div>
			<div class="form-group">
				<label for="nomina" class="form-text">Nomina</label>
				<input type="text" name="nomina" class="form-control">
			</div>
			<input type="submit" name="Enviar" class="btn btn-danger">
		</form>
	</x-slot>
</x-menu-grupos>