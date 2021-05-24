<x-menu-grupos>
	<x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger"> Grupos </a> > 
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
                <h1>{{$grupo->nombre}}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col ml-2">
                        <span class="row"><b>Profesor:</b>&nbsp;{{$profesor->nombre}}&nbsp;{{$profesor->apellidos}}</span>
                        <span class="row"><b>Espacio:</b>&nbsp;{{$espacio->nombre}}</span>
                        <span class="row"><b>Planta:</b>&nbsp;{{$espacio->planta}}</span>
                        @if($actividad!=null)<span class="row"><b>Actividad:</b>&nbsp;{{$actividad->nombre}}</span>@endif
                    </div>
                    
                </div>
            </div>
        </div>

	</x-slot>
</x-menu-grupos>
