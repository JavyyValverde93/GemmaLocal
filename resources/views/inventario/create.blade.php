<x-menu-grupos>
  <x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('inventario.index')}}" class="text-danger">Inventario</a> >
      <a href="{{route('inventario.create')}}" class="text-danger">Añadir Inventario</a> >
    </div>
    <style>
      
      label::after{
            content: "*";
            color: red;
      }
    </style>
    <h1 class="mt-1">Inventario</h1>
      <form action="{{route('inventario.store')}}" method="POST" class="mt-4 border p-5" style="width: 1200px">
        @csrf
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputDatos">Datos</label><br>
                <textarea name="datos" cols="50" required></textarea>
              </div>
          </div>
          <button type="submit" class="btn btn-danger">Guardar</button>
      </form>
  </x-slot>
</x-menu-grupos>
    