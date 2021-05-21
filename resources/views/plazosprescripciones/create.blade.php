<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('prescripciones.index')}}" class="text-danger">Prescripciones</a> >
            <a href="{{route('prescripciones.index')}}" class="text-danger">Plazos</a> >
            <a href="{{route('plazosprescripciones.create')}}" class="text-danger">Crear Plazos Prescripción</a> >
        </div>
        <form action="{{route('plazosprescripciones.store')}}" method="POST" class="mt-4 border p-5" style="width: 1200px">
            @csrf
            <div class="form-row col-md-10">
                <div class="form-group col-md-5">
                    <label for="inputName">Nombre de la Prescripción</label>
                    <input type="name" class="form-control" name="nombre" placeholder="Nombre de la Prescripción">
                    <small>{{$errors->first('nombre')}}</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputStartDate">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio">
                    <small>{{$errors->first('fecha_inicio')}}</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCloseDate">Fecha de Cierre</label>
                    <input type="date" class="form-control" name="fecha_fin">
                    <small>{{$errors->first('fecha_fin')}}</small>
                  
                </div>
            </div>
          <button type="submit" class="btn btn-danger ml-3">Crear Plazo</button>

        </form>
    </x-slot>
</x-menu-grupos>