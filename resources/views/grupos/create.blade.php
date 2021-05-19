<x-menu-grupos>
  <x-slot name="slot">

    <style>
      select{
        font-size: 20px;
        width: auto;
        padding-right: 26px;
      }
      
      label::after{
            content: "*";
            color: red;
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
              <label>Nombre de la Actividad:</label><br>
              <input type="text" name="nombre_actividad">
            </div>
            <div class="form-group mx-4">
              <label>Categoría:</label><br>
              <select name="id_categoria">
                <option>Seleccione la categoría...</option>
                @foreach ($categorias as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mx-4">
              <label>Descripción:</label><br>
              <textarea name="descripcion"></textarea>
            </div>
          </div>

            <div class="form-row">
              <div class="form-group mx-4">
                <label>Horas:</label><br>
                <input type="number" name="horas">
              </div>
              <div class="form-group mx-4">
                <label>Asistencia:</label><br>
                <select name="asistencia">
                  <option value="presencial">Presencial</option>
                  <option value="no presencial">No Presencial</option>
                </select>
              </div>
              <div class="form-group mx-4">
                <label>Anio académico:</label><br>
                <input type="text" name="anio_academico">
              </div>

  
          </div>
          <button type="submit" class="btn btn-danger ml-3">Crear grupo</button>
        </form>
      
  </x-slot>
</x-menu-grupos>
  
