<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('matriculas.index')}}" class="text-danger">Matrículas</a> >
            <a href="{{route('plazosmatriculas.index')}}" class="text-danger">Plazos Matrículas</a> >
        </div>
        <script>
            navselected = 'matricula';
        </script>
        <form action="{{route('plazosmatriculas.store')}}" method="POST" class="mt-4 border p-5">
            @csrf
            <div class="form-row col-md-12">
                <div class="form-group col-md-4">
                    <label for="inputName">Nombre del Plazo</label>
                    <input required type="text" class="form-control" name="nombre" placeholder="Nombre de la Actividad">
                    <small>{{$errors->first('nombre')}}</small>
                </div>
                <div class="form-group col-md-4">
                    <label>Fecha de Inicio</label>
                    <input required type="date" class="form-control" name="fecha_inicio">
                    <small>{{$errors->first('fecha_inicio')}}</small>
                </div>
                <div class="form-group col-md-4">
                    <label>Fecha de Cierre</label>
                    <input required type="date" class="form-control" name="fecha_fin">
                    <small>{{$errors->first('fecha_fin')}}</small>                  
                </div>
            </div>
          <button type="submit" class="btn btn-danger">Crear Plazo</button>
        </form>
    </x-slot>
</x-menu-grupos>