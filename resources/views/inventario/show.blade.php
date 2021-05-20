<x-menu-grupos>
	<x-slot name="slot">
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
                <h1>{{$inventario->nombre}}</h1>
            </div>
            <div class="card-body">

                        <textarea class="form-control" readonly>{{$inventario->datos}}</textarea>
                    </div>
                    
                </div>
            </div>
        </div>

	</x-slot>
</x-menu-grupos>
