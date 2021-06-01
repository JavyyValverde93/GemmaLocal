<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('roles.index')}}" class="text-danger">Roles</a> >
        </div>        
        <h1 class="text-center">Roles</h1>
        <style>
            select{
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

			input.list {
                font-size: 20px;
                width: 420px;
                padding-right: 26px;
            }
			
            label::after {
                content: " *";
                color: red;
            }

        </style>
		<div id="ch">
			<datalist id="permisos">
				@forelse ($permisos as $item)
				<option class="{{$item->id}}">{{$item->nombre}}</option>
				@empty
				<option>Este Rol dispone de todos los permisos</option>
				@endforelse
			</datalist>
		</div>
        <form action="{{route('rolespermisos.store')}}" method="POST" class="ml-5 mt-4 border p-5">
            @csrf
            <div class="form-group row">
                <div class="col">
                    <label for="nombre" class="form-text">Rol:</label><br>
					<select name="rol" required onchange="selectRol()">
						<option>Seleccione el Rol...</option>
						@foreach ($roles as $item)
						<option value="{{$item->id}}" @if($request->rol==$item->id) selected
							@endif>{{$item->nombre}}</option>
						@endforeach
					</select>
					<small>{{$errors->first('rol')}}</small>
                </div>
                <div class="col">
                    <label class="form-text">Permisos Disponibles:</label><br>
                    {{-- <select name="permiso">
						<option>Seleccione el Permiso...</option>
						@foreach ($permisos as $item)
							<option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                    </select> --}}
                    <input list="permisos" id="perm" name="permname" class="list rounded" value="{{old('permname')}}"
                        style="border: 2px black solid" onchange="valuePermiso()" required><br>
                    <small id="small">{{$errors->first('permiso')}}</small><br>
                    <input type="hidden" name="permiso" required>
                </div>
                <script>
					if(document.getElementById('permisos').getElementsByTagName('option').length==1 && typeof document.getElementById('permisos').getElementsByTagName('option')[0]!='number'){
						document.getElementById('perm').value = document.getElementById('permisos').getElementsByTagName('option')[0].value;
					}
                    function valuePermiso(event) {
                        permisos = document.getElementById('permisos').getElementsByTagName('option');
                        perm = document.getElementById('perm');
                        id_permiso = document.getElementsByName('permiso')[0];
                        id_permiso.value = "";
                        perm.style.border = "solid 2px red";
                        document.getElementById('small').innerText = "El permiso no existe";
                        for (i = 0; i < permisos.length; i++) {
                            if (perm.value == permisos[i].value) {
                                id_permiso.value = permisos[i].classList[0];
                                document.getElementById('small').innerText = "";
								perm.style.border = "solid 2px lime";
                                break;
                            }
                        }
                    }

					function selectRol(){
						window.location.href="{{route('rolespermisos.create')}}?rol="+document.getElementsByName('rol')[0].value;
					}

                </script>
            </div>
            <button type="submit" class="btn btn-danger" onclick="valuePermiso(event)">Enviar</button>
        </form>
    </x-slot>
</x-menu-grupos>
