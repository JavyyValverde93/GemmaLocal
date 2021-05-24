<x-menu-grupos>
    <x-slot name="slot">
        <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
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
      <script>
        $(function(){
            $('input[name=fecha_nacimiento]').on('change', calcularEdad);
        });
        
        function calcularEdad() {
            
            fecha = $(this).val();
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            $('input[name=edad]').val(edad);
        }
      </script>
      <h5 class="text-center">Crear Alumnos</h5>
        <form action="{{route('alumnos.store')}}" method="POST" class="mt-4 border p-5" enctype="multipart/form-data" style="width: 1200px" onsubmit="disableButton(this)">
          @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Nombre">
                  <small></small>{{$errors->first('nombre')}}</small>
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{old('apellidos')}}" placeholder="Apellidos">
                  <small>{{$errors->first('apellidos')}}</small>
                </div>
                <div class="form-group col-md-3 offset-md-1">
                  <div>Foto</div>
                  <input type="file" class="form-control" id="foto" name="foto" value="{{old('foto')}}">
                  <small>{{$errors->first('foto')}}</small>
                </div>
              </div>
             
              <div class="form-row">
                <div class="form-group form-group col-md-2">
                  <label>Dni</label>
                  <input type="text" class="form-control" id="dni" name="dni" value="{{old('dni')}}" placeholder="Dni">
                  <small>{{$errors->first('dni')}}</small>
                </div>
                <div class="col-md-2 offset-md-1">
                  <label>Domicilio</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{old('domicilio')}}" placeholder="Domicilio">
                  <small>{{$errors->first('domicilio')}}</small>
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Poblacion</label>
                  <input type="text" class="form-control" id="poblacion" name="poblacion" value="{{old('poblacion')}}" placeholder="Poblacion">
                  <small>{{$errors->first('poblacion')}}</small>
                  </div>
                </div>
      
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Provincia</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" value="{{old('provincia')}}" placeholder="Provincia">
                    <small>{{$errors->first('provincia')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" value="{{old('pais')}}" placeholder="Pais">
                    <small>{{$errors->first('pais')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="Telefono">
                    <small>{{$errors->first('telefono')}}</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>C.Postal</label>
                    <input type="text" class="form-control" id="cpostal" name="codigo_postal" value="{{old('codigo_postal')}}" placeholder="Codigo Postal">
                    <small>{{$errors->first('codigo_postal')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Sexo</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" value="{{old('sexo')}}" placeholder="Sexo">
                    <small>{{$errors->first('sexo')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                    <small>{{$errors->first('email')}}</small>
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Fecha Nacimiento</label>
                    <input type="date" id="fechan" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                    <small>{{$errors->first('fecha_nacimiento')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="{{old('edad')}}"  min="16" max="70">
                    <small>{{$errors->first('edad')}}</small>
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Lugar Nacimiento</label>
                    <input type="text" class="form-control" id="nacimiento" name="lugar_nacimiento" value="{{old('lugar_nacimiento')}}" placeholder="Lugar Nacimiento">
                    <small>{{$errors->first('lugar_nacimiento')}}</small>
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Nss</label>
                    <input type="text" class="form-control" id="nss" name="nss" value="{{old('nss')}}"  placeholder="NSS">
                    <small>{{$errors->first('nss')}}</small>
                  </div>
                </div>
      
    
            <div class="form-row">
              <div class="form-group mx-4">
              </div>
    
            </div>
            <button type="submit" class="btn btn-danger ml-3">Crear alumno</button>
           
          </form>
        
    </x-slot>
  </x-menu-grupos>