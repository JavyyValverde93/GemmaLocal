<x-menu-grupos>
  <x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('periodoscalificaciones.index')}}" class="text-danger">Periodo Calificaciones</a> >
    </div>
    <h5 class="text-center" class="mt-1">Periodo Calificación</h5>
    <form action="{{route('periodoscalificaciones.store')}}" method="POST" class="mt-4 border p-5" style="width: 1200px">
      @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputName">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
                <small>{{$errors->first('nombre')}}</small>
              </div>
            <div class="form-group col-md-3">
              <label for="inputFechaIni">Fecha Inicio</label>
              <input type="date" class="form-control" name="fecha_inicio" required>
              <small>{{$errors->first('fecha_inicio')}}</small>
            </div>
            <div class="form-group col-md-3">
              <label for="inputFechaFin">Fecha Fin</label>
              <input type="date" class="form-control" name="fecha_fin" required>
              <small>{{$errors->first('fecha_fin')}}</small>
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Guardar</button>
    </form>

  </x-slot>
</x-menu-grupos>