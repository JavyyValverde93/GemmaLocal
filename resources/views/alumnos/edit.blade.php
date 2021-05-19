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
        <form action="{{route('alumnos.update', $alumno)}}" enctype="multipart/form-data" method="POST" class="ml-5 mt-4 border p-5" style="width: 1200px" onsubmit="disableButton(this)">
          @csrf
			@method('PUT')
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$alumno->nombre}}">
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{$alumno->apellidos}}">
                </div>
                <div class="form-group col-md-3 offset-md-1">
                  <div>Foto</div>
                  <input type="file" class="form-control" id="foto" name="foto">
                </div>
              </div>
             
              <div class="form-row">
                <div class="form-group form-group col-md-2">
                  <label>Dni</label>
                  <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni" value="{{$alumno->dni}}">
                </div>
                <div class="col-md-2 offset-md-1">
                  <label>Domicilio</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" value="{{$alumno->domicilio}}">
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Poblacion</label>
                  <input type="text" class="form-control" id="poblacion" name="poblacion" placeholder="Poblacion" value="{{$alumno->poblacion}}">
                  </div>
                </div>
      
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Provincia</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="{{$alumno->provincia}}">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="{{$alumno->pais}}">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{$alumno->telefono}}">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>C.Postal</label>
                    <input type="text" class="form-control" id="cpostal" name="codigo_postal" placeholder="Codigo Postal" value="{{$alumno->codigo_postal}}">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Sexo</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" value="{{$alumno->sexo}}">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$alumno->email}}">
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad"  min="16" max="70" value="{{$alumno->edad}}">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Fecha Nacimiento</label>
                    <input type="date" id="fechan" name="fecha_nacimiento" value="{{date("Y-m-d", $alumno->fecha_nacimiento)}}">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Lugar Nacimiento</label>
                    <input type="text" class="form-control" id="nacimiento" name="lugar_nacimiento" placeholder="Lugar Nacimiento" value="{{$alumno->lugar_nacimiento}}">
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Nss</label>
                    <input type="text" class="form-control" id="nss" name="nss"  placeholder="NSS" value="{{$alumno->nss}}">
                  </div>
                </div>
      
    
            <div class="form-row">
              <div class="form-group mx-4">
              </div>
    
            </div>
            <button type="submit" class="btn btn-danger ml-3">Modificar alumno</button>
           
          </form>
        
    </x-slot>
  </x-menu-grupos>