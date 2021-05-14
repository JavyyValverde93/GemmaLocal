<x-menu-grupos>
  <x-slot name="slot">
    <x-alert-message></x-alert-message>
    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <style>
      select{
        font-size: 20px;
        width: auto;
        padding-right: 26px;
      }
    </style>
      <form action="{{route('grupos.store')}}" method="POST" class="ml-5 mt-4 border p-5" style="width: 1200px">
        @csrf
          <div class="form-row">
            <div class="form-group col-md-6 mx-4">
              <label for="inputEmail4">Nombre:</label>
              <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombre del grupo">
            </div>
          </div>
  
          <div class="form-row">
  
            <div class="form-group col-auto mx-4">
              <div class="row">
                <div class="col">
                  <label>Profesor:</label><br>
                  <select name="id_profesor" required>
                    <option>Selecciones un profesor..</option>
                    @foreach($profesores as $item)
                    <option value="{{$item->id}}">{{$item->apellidos}} {{$item->nombre}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                  <label>Espacio:</label><br>
                  <select name="id_espacio" required>
                    <option>Seleccione un espacio..</option>
                    @foreach($espacios as $item)
                    <option value="{{$item->id}}">P:{{$item->planta}} - {{$item->nombre}}</option>
                    @endforeach
                  </select>

                </div>
              </div>
            </div>
  
          </div>
  
          <div class="form-row">
            <div class="form-group mx-4">
            </div>
  
          </div>
          <button type="submit" class="btn btn-danger ml-3">Crear grupo</button>
        </form>
      
  </x-slot>
</x-menu-grupos>
  
