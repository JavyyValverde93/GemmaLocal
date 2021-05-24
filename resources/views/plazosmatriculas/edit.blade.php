<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('matriculas.index')}}" class="text-danger">Matriculas</a> >
        </div>
        <script>
            navselected = 'matricula';
        </script>
        <form action="{{route('plazosmatriculas.update', $plazomatricula)}}" method="POST" class="mt-4 border p-5">
            @csrf
            @method('PUT')
            <div class="form-row col-md-10">
                <div class="form-group col-md-12">
                    <label>Nombre del Plazo</label>
                    <input required type="text" class="form-control" name="nombre" placeholder="Nombre de la Actividad" value="{{$plazomatricula ->nombre}}">
                    <small>{{$errors->first('nombre')}}</small>
                </div>
                <div class="form-group col-md-5">
                    <label>Fecha de Inicio</label>
                    <input required type="date" class="form-control" name="fecha_inicio" value="{{date("Y-m-d", $plazomatricula ->fecha_inicio)}}">
                    <small>{{$errors->first('fecha_inicio')}}</small>
                </div>
                <div class="form-group col-md-5">
                    <label>Fecha de Cierre</label>
                    <input required type="date" class="form-control" name="fecha_fin" value="{{date("Y-m-d", $plazomatricula ->fecha_fin)}}">
                    <small>{{$errors->first('fecha_fin')}}</small>
                  
                </div>
            </div>
          <button type="submit" class="btn btn-danger">Modificar Plazo</button>

        </form>
    </x-slot>
</x-menu-grupos>