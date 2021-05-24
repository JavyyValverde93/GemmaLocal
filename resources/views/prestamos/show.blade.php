<x-menu-grupos>
	<x-slot name="slot">
        <script>
            navselected = 'inventario';
        </script>
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
                <h1>Pr&eacute;stamo: {{$prestamo->id}}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col ml-2">
                        <span class="row"><b>Usuario:</b>&nbsp;{{$prestamo->user->name}}</span>
                        <span class="row"><b>Importe:</b>&nbsp;{{$prestamo->importe_fianza}}</span>
                        <span class="row"><b>Concepto:</b>&nbsp;{{$prestamo->concepto_fianza}}</span>
                        <b>Observaciones</b>
                        <textarea class="form-control">{{$prestamo->observaciones}}</textarea>
                    </div>
                    
                </div>
            </div>
        </div>

	</x-slot>
</x-menu-grupos>
