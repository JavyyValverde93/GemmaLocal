<x-menu-grupos>
	<x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
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
		<div class="card text-center border-danger mr-3">
            <div class="card-header">
                <h1>{{$espacio->nombre}}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col ml-2">
                        <span class="row"><b>Capacidad:</b>&nbsp;{{$espacio->capacidad}}</span>
                        <span class="row"><b>Planta:</b>&nbsp;{{$espacio->planta}}</span>
                        <span class="row"><b>Turno:</b>&nbsp;{{$espacio->turno}}</span>
                    </div>
                    
                </div>
            </div>
        </div>

	</x-slot>
</x-menu-grupos>