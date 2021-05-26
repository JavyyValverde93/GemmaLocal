<x-menu-grupos>
  <x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
    </div>
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
    <h5 class="text-center">Crear Espacios</h5>
      <form action="{{route('espacios.store')}}" method="POST" class="mt-4 border p-5" onsubmit="disableButton(this)">
        @csrf
          <div class="form-row">
            <div class="form-group col-md-6 mx-4">
              <label for="inputEmail4">Nombre:</label>
              <input type="text" name="nombre" class="form-control" placeholder="Nombre del espacio">
              <small>{{$errors->first('nombre')}}</small>
            </div>
          </div>
  
          <div class="form-row">
            <div class="form-group mx-4">
              <label>Capacidad:</label>
              <input type="number" name="capacidad" step="1" min="0" required class="form-control" placeholder="Capacidad de alumnos">
              <small>{{$errors->first('capacidad')}}</small>
            </div>
  
            <div class="form-group col-auto mx-4">
              <label>Planta:</label>
              <input type="number" name="planta" step="1" required value="{{old('planta')}}" class="form-control" placeholder="Número de planta">
              <small>{{$errors->first('planta')}}</small>
            </div>
  
            <div class="form-group col-auto mx-4">
              <label>Activo:</label><br>
              <select name="activo" required>
                <option value="false" selected>No</option>
                <option value="true">Sí</option>
              </select>
              <small>{{$errors->first('activo')}}</small>
            </div>
  
          </div>
  
          <div class="form-row">
            <div class="form-group mx-4">
              <label>Aula combinada:</label><br>
              <select name="aula_combinada" required>
                <option value="false" selected>No</option>
                <option value="true">Sí</option>
              </select>
              <small>{{$errors->first('aula_combinada')}}</small>
            </div>
  
            <div class="form-group col-auto mx-4">
              <label>Turno:</label><br>
              <select name="turno" required>
                <option value="mañana" selected>Mañana</option>
                <option value="tarde">Tarde</option>
              </select>
              <small>{{$errors->first('turno')}}</small>
            </div>
  
          </div>
          <button type="submit" class="btn btn-danger ml-3">Crear espacio</button>
        </form>  

  </x-slot>
</x-menu-grupos>