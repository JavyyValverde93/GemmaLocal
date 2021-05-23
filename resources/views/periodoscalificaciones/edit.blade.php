<x-menu-grupo>
    <x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('periodoscalificaciones.index')}}" class="text-danger">Periodo Calificaciones</a> >
    </div>
      <h1 class="ml-5 mt-1">Periodo Calificación</h1>
      <form action="{{route('periodoscalificaciones.update', $periodocalificacion)}}" method="POST" class="ml-5 mt-4 border p-5" style="width: 1200px">
        @csrf
          <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="inputName">Nombre</label>
                  <input type="text" class="form-control" name="nombre" required value="{{$periodocalificacion ->nombre}}">
                  <small>{{$errors->first('nombre')}}</small>
                </div>
              <div class="form-group col-md-4">
                <label for="inputFechaIni">Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" required value="{{date("d/m/Y", $periodocalificacion ->fecha_inicio)}}">
                <small>{{$errors->first('fecha_inicio')}}</small>
              </div>
              <div class="form-group col-md-4">
                <label for="inputFechaFin">Fecha Fin</label>
                <input type="date" class="form-control" name="fecha_fin" required value="{{date("d/m/Y", $periodocalificacion ->fecha_fin)}}">
                <small>{{$errors->first('fecha_fin')}}</small>
              </div>
          </div>
          <button type="submit" class="btn btn-danger">Guardar</button>
      </form>
  
    </x-slot>
  </x-menu-grupo>