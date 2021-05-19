<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.create')}}" class="text-danger">Crear Alumnos</a> >
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
        <form action="{{route('alumnos.store')}}" method="POST" class="mt-4 border p-5" enctype="multipart/form-data" style="width: 1200px" onsubmit="disableButton(this)">
          @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                </div>
                <div class="form-group col-md-3 offset-md-1">
                  <div>Foto</div>
                  <input type="file" class="form-control" id="foto" name="foto">
                </div>
              </div>
             
              <div class="form-row">
                <div class="form-group form-group col-md-2">
                  <label>Dni</label>
                  <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni">
                </div>
                <div class="col-md-2 offset-md-1">
                  <label>Domicilio</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio">
                </div>
                <div class="form-group col-md-2 offset-md-1">
                  <label>Poblacion</label>
                  <input type="text" class="form-control" id="poblacion" name="poblacion" placeholder="Poblacion">
                  </div>
                </div>
      
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Provincia</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>C.Postal</label>
                    <input type="text" class="form-control" id="cpostal" name="codigo_postal" placeholder="Codigo Postal">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Sexo</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Fecha Nacimiento</label>
                    <input type="date" id="fechan" name="fecha_nacimiento">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad"  min="16" max="70">
                  </div>
                  <div class="form-group col-md-2 offset-md-1">
                    <label>Lugar Nacimiento</label>
                    <input type="text" class="form-control" id="nacimiento" name="lugar_nacimiento" placeholder="Lugar Nacimiento">
                  </div>
                </div>
      
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Nss</label>
                    <input type="text" class="form-control" id="nss" name="nss"  placeholder="NSS">
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