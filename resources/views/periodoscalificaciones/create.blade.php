<x-menu-grupos>
  <x-slot name="slot">
    <h1 class="ml-5 mt-1">Periodo Calificación</h1>
    <form action="{{route('periodoscalificaciones.store')}}" method="POST" class="ml-5 mt-4 border p-5" style="width: 1200px">
      @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputName">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
            <div class="form-group col-md-4">
              <label for="inputFechaIni">Fecha Inicio</label>
              <input type="date" class="form-control" name="fecha_inicio" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputFechaFin">Fecha Fin</label>
              <input type="date" class="form-control" name="fecha_fin" required>
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Guardar</button>
    </form>

  </x-slot>
</x-menu-grupos>