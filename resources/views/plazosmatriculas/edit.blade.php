<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('matriculas.index')}}" class="text-danger">Matriculas</a> >
        </div>
        <form action="{{route('plazosmatriculas.update', $plazomatricula)}}" method="POST" class="mt-4 border p-5" style="width: 1200px">
            @csrf
            <div class="form-row col-md-10">
                <div class="form-group col-md-5">
                    <label for="inputName">Nombre del Plazo</label>
                    <input type="nombre" class="form-control" name="nombre" placeholder="Nombre de la Actividad" value="{{$plazomatricula ->nombre}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputStartDate">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" value="{{date("d/m/Y", $plazomatricula ->fecha_inicio)}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCloseDate">Fecha de Cierre</label>
                    <input type="date" class="form-control" name="fecha_fin" value="{{date("d/>m/Y", $plazomatricula ->fecha_fin)}}">
                  
                </div>
            </div>
          <button type="submit" class="btn btn-danger ml-3">Crear Plazo</button>

        </form>
    </x-slot>
</x-menu-grupos>