<x-menu-grupos>
	<x-slot name="slot">
	<div class="row migaspan">
		<a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        <a href="{{route('salarios.index')}}" class="text-danger">Salarios</a> >
    </div>
		<h5 class="text-center">Salario</h5>
		<form class="mt-4 border p-5" action="{{route('salarios.edit', $salario)}}" method="POST">
            @method('PUT')
			<div class="form-group">
				<label for="total_mes" class="form-text">Total mes</label>
				<input type="number" name="total_mes" step="0.01" class="form-control" value="{{$salario->total_mes}}">
				<small>{{$errors->first('total_mes')}}</small>
			</div>
			<div class="form-group">
				<label for="nomina" class="form-text">Nomina</label>
				<input type="text" name="nomina" class="form-control" value="{{$salario->nomina}}">
				<small>{{$errors->first('nomina')}}</small>
			</div>
			<button type="submit" name="Enviar" class="btn btn-danger">Modificar Salario</button>
		</form>
	</x-slot>
</x-menu-grupos>