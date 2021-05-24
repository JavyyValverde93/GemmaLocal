<x-menu-grupos>
    <x-slot name="slot">
    <div class="row migaspan">
        <a href="{{route('prescripciones.index')}}" class="text-danger">Prescripciones</a> >
        <a href="{{route('plazosmatriculas.index')}}" class="text-danger">Plazos</a> >
    </div>
    <h5 class="text-center">Plazos Prescripción</h5>
        <form action="{{route('plazosprescripciones.update', $plazoprescripcion)}}" method="POST" class="ml-5 mt-4 border p-5">
            @csrf
            @method('PUT')
            <div class="form-row col-md-12">
                <div class="form-group col-md-5">
                    <label>Nombre de la Prescripción</label>
                    <input required type="name" class="form-control" name="nombre" placeholder="Nombre de la Prescripción" value="{{$plazoprescripcion->nombre}}">
                    <small>{{$errors->first('nombre')}}</small>
                </div>
            </div>
            <div class="form-row col-md-12">
                <div class="form-group col-md-5">
                    <label>Fecha de Inicio</label>
                    <input required type="date" class="form-control" name="fecha_inicio" value="{{date("Y-m-d", $plazoprescripcion->fecha_inicio)}}">
                    <small>{{$errors->first('fecha_inicio')}}</small>
                </div>
                <div class="form-group col-md-5">
                    <label>Fecha de Cierre</label>
                    <input required type="date" class="form-control" name="fecha_fin" value="{{date("Y-m-d", $plazoprescripcion->fecha_fin)}}">
                    <small>{{$errors->first('fecha_fin')}}</small>
                  
                </div>
            </div>
          <button type="submit" class="btn btn-danger ml-3">Modificar Plazo</button>

        </form>
    </x-slot>
</x-menu-grupos>