<x-menu-grupos>
	<x-slot name="slot">
	<div class="row migaspan">
        <a href="{{route('salarios.index')}}" class="text-danger">Salarios</a> >
        <a href="{{route('salarios.create')}}" class="text-danger">Crear Salarios</a> >
    </div>
		<h1 class="text-center">Salario</h1>
		<form action="{{route('salarios.store')}}" method="POST" class="ml-5 mt-4 border p-5">
			@csrf
			<div class="form-group">
				<input type="hidden" name="id_usuario" value="{{$id_usuario}}">
				<input type="hidden" name="id_profesor" value="{{$profesor->id}}">
				<label for="total_mes" class="form-text">Total mes</label>
				<input type="number" name="total_mes" value="{{old('total_mes')}}" step="0.01" class="form-control">
				<small>{{$errors->first('total_mes')}}</small>
			</div>
			<div class="form-group">
				<label for="nomina" class="form-text">Nomina</label>
				<input type="text" name="nomina" value="{{old('nomina')}}" class="form-control">
				<small>{{$errors->first('nomina')}}</small>
			</div>
			<button type="submit" class="btn btn-danger">Enviar</button>
		</form>
	</x-slot>
</x-menu-grupos>