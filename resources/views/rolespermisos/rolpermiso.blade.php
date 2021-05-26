<x-menu-grupos>
	<x-slot name="slot">
		<h1 class="text-center">Roles</h1>
		<style>
            select {
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

            label::after {
                content: " *";
                color: red;
            }

		</style>
		<form action="{{route('rolespermisos.store')}}" method="POST" class="ml-5 mt-4 border p-5">
			@csrf 
			<div class="form-group row">
				<div class="col">
					<label for="nombre" class="form-text">Rol</label><br>
					<select name="rol">
						<option>Seleccione el Rol...</option>
						@foreach ($roles as $item)
							<option value="{{$item->id}}">{{$item->nombre}}</option>
						@endforeach
					</select>
					<small>{{$errors->first('rol')}}</small>
				</div>
				<div class="col">
					<label class="form-text">Permiso</label><br>
					<select name="permiso">
						<option>Seleccione el Permiso...</option>
						@foreach ($permisos as $item)
							<option value="{{$item->id}}">{{$item->nombre}}</option>
						@endforeach
					</select>
					<small>{{$errors->first('rol')}}</small>
				</div>
			</div>
			<button type="submit" class="btn btn-danger">Enviar</button>
		</form>
	</x-slot>
</x-menu-grupos>