<x-menu-grupos>
    <x-slot name="slot">
        <form action="{{route('plazosmatriculas.store')}}" method="POST" class="ml-5 mt-4 border p-5" style="width: 1200px">
            @csrf
            <div class="form-row col-md-10">
                <div class="form-group col-md-5">
                    <label for="inputName">Nombre del Plazo</label>
                    <input type="nombre" class="form-control" name="nombre" placeholder="Nombre de la Actividad">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputStartDate">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCloseDate">Fecha de Cierre</label>
                    <input type="date" class="form-control" name="fecha_fin">
                  
                </div>
            </div>
          <button type="submit" class="btn btn-danger ml-3">Crear Plazo</button>

        </form>
    </x-slot>
</x-menu-grupos>