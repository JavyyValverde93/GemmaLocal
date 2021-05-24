<x-menu-grupos>
	<x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('inventario.index')}}" class="text-danger">Inventario</a> >
        </div>
		<style>
			label.input-custom-file input[type=file] {
				display: none;
			}

			label:not(.no)::after{
				content: "*";
				color: red;
			}
		</style>
		<div class="card text-center border-danger mt-3 ">
            <div class="card-header">
                <h5>{{$inventario->nombre}}</h5>
            </div>
            <div class="card-body">

                        <textarea class="form-control" readonly>{{$inventario->datos}}</textarea>
                    </div>
                    
                </div>
            </div>
        </div>

	</x-slot>
</x-menu-grupos>
