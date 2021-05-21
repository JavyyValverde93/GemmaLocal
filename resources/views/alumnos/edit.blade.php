<x-menu-grupos>
    <x-slot name="slot">
      <small>{{$errors->first('slot')}}</small>
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
                  <small>{{$errors->first('nombre')}}</small>
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{$alumno->apellidos}}">
                  <small>{{$errors->first('apellidos')}}</small>
                </div>
                <div class="form-group col-md-3 offset-md-1">
                  <div>Foto</div>
                  <input type="file" class="form-control" id="foto" name="foto">
                  <small>{{$errors->first('foto')}}</small>
                </div>
              </div>
             
              <div class="form-row">
                <div class="form-group form-group col-md-2">
                  <label>Dni</label>
                  <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni" value="{{$alumno->dni}}">
                  <small>{{$errors->first('dni')}}</small>
                </div>
                <div class="col-md-2 offset-md-1">
                  <label>Domicilio</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" value="{{$alumno->domicilio}}">
                  <small>{{$errors->first('domicilio')}}</small>
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Poblacion</label>
                  <input type="text" class="form-control" id="poblacion" name="poblacion" placeholder="Poblacion" value="{{$alumno->poblacion}}">
                  <small>{{$errors->first('poblacion')}}</small>
                  </div>
                </div>
      
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Provincia</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="{{$alumno->provincia}}">
                    <small>{{$errors->first('provincia')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="{{$alumno->pais}}">
                    <small>{{$errors->first('pais')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{$alumno->telefono}}">
                    <small>{{$errors->first('telefono')}}</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>C.Postal</label>
                    <input type="text" class="form-control" id="cpostal" name="codigo_postal" placeholder="Codigo Postal" value="{{$alumno->codigo_postal}}">
                    <small>{{$errors->first('codigo_postal')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Sexo</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" value="{{$alumno->sexo}}">
                    <small>{{$errors->first('sexo')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$alumno->email}}">
                    <small>{{$errors->first('email')}}</small>
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad"  min="16" max="70" value="{{$alumno->edad}}">
                    <small>{{$errors->first('edad')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Fecha Nacimiento</label>
                    <input type="date" id="fechan" name="fecha_nacimiento" value="{{date("Y-m-d", $alumno->fecha_nacimiento)}}">
                    <small>{{$errors->first('fecha_nacimiento')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Lugar Nacimiento</label>
                    <input type="text" class="form-control" id="nacimiento" name="lugar_nacimiento" placeholder="Lugar Nacimiento" value="{{$alumno->lugar_nacimiento}}">
                    <small>{{$errors->first('lugar_nacimiento')}}</small>
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Nss</label>
                    <input type="text" class="form-control" id="nss" name="nss"  placeholder="NSS" value="{{$alumno->nss}}">
                    <small></small>{{$errors->first('nss')}}</small>
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