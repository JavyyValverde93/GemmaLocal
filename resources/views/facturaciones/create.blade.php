<x-menu-grupos>
    <x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
    </div>
        <style>
            select {
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

            label:not(.no)::after{
                content: " *";
                color: red;
            }

        </style>
        <h5 class="text-center">Crear Factura de {{$profesor->nombre}} {{$profesor->apellidos}}</h5>
        <form action="{{route('facturaciones.store')}}" method="POST" class="mt-4 border p-5" style="width: 1200px">
          @csrf
            <div class="form-row">
              <input type="hidden" name="id_usuario" value="{{$id_usuario}}">
              <div class="form-group col-md-4 mx-4">
                    <label for="inputEmail4">Forma de pago:</label>
                    <input type="text" name="forma_pago" value="{{old('forma_pago')}}" class="form-control" id="inputEmail4" placeholder="Forma de pago">
                    <small>{{$errors->first('forma_pago')}}</small>
              </div>

              <div class="form-group col-md-3 mx-4">
                    <label>Número de tarjeta:</label>
                    <input type="number" step="1" required name="num_tarjeta" value="{{old('num_tarjeta')}}"
                    {{$errors->first('num_tarjeta')}}
                        class="form-control" placeholder="Número de tarjeta">
              </div>
            </div>

            <div class="form-row">
                <div class="form-group col-auto mx-4">
                    <label>Caducidad:</label><br>
                    <input type="number" min="01" max="12" step="1" name="caducidad" value="{{old('caducidad')}}" size="2"> / <input type="number" step="1" min="21" max="50" name="caducidad2" value="{{old('caducidad2')}}" maxlength="2">
                    <small>{{$errors->first('caducidad')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label class="no">Descripción:</label><br>
                    <textarea name="descripcion" cols="60" rows="1" required>{{old('descripcion')}}</textarea>
                </div>{{$errors->first('descripcion')}}</small>

            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Tarifa Asignada:</label><br>
                    <input type="text" name="tarifa_asignada" value="{{old('tarifa_asignada')}}" required>
                    <small>{{$errors->first('tarifa_asignada')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Riesgo máximo:</label><br>
                    <input type="text" name="riesgo_maximo" value="{{old('riesgo_maximo')}}" required>
                    <small>{{$errors->first('riesgo_maximo')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Día pago:</label><br>
                    <input type="number" name="dia_pago" value="{{old('dia_pago')}}" step="1" min="1" max="31" required>
                    <small>{{$errors->first('dia_pago')}}</small>
                </div>

                <div class="form-grou col-auto mx-4">
                    <label>Descuento:</label><br>
                    <input type="number" step="1" min="0" max="100" name="descuento" value="{{old('descuento')}}" required>  %
                    <small>{{$errors->first('descuento')}}</small>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Precio/hora:</label><br>
                    <input type="number" name="precio_hora" value="{{old('precio_hora')}}" step="0.01" min="0" required>
                    <small>{{$errors->first('precio_hora')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Subcuenta contable:</label><br>
                    <input type="text" name="subcuenta_contable" value="{{old('subcuenta_contable')}}">
                    <small>{{$errors->first('subcuenta_contable')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Titular de la cuenta:</label><br>
                    <input type="text" name="titular_cuenta" value="{{old('titular_cuenta')}}" required>
                    <small>{{$errors->first('titular_cuenta')}}</small>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>DNI titular:</label><br>
                    <input type="text" name="dni_titular" value="{{old('dni_titular')}}" required>
                    <small>{{$errors->first('dni_titular')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Nacionalidad del titular:</label><br>
                    <input type="text" name="nacionalidad_titular" value="{{old('nacionalidad_titular')}}" required>
                    <small>{{$errors->first('nacionalidad_titular')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Email del titular:</label><br>
                    <input type="email" name="email_titular" value="{{old('email_titular')}}" required>
                    <small>{{$errors->first('email_titular')}}</small>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Cuenta:</label><br>
                    <input type="text" name="cuenta" value="{{old('cuenta')}}" required>
                    <small>{{$errors->first('cuenta')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Iban:</label><br>
                    <input type="text" name="iban" value="{{old('iban')}}" required>
                    <small>{{$errors->first('iban')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Mandato sepa:</label><br>
                    <input type="text" name="mandato_sepa" value="{{old('mandato_sepa')}}" required>
                    <small>{{$errors->first('mandato_sepa')}}</small>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Swift:</label><br>
                    <input type="number" name="swift" value="{{old('swift')}}" step="1" min="0" required>
                    <small>{{$errors->first('swift')}}</small>
                </div>

                {{-- <div class="form-group col-auto mx-4">
                    <label>Fecha mandato:</label><br>
                    <input type="date" name="fecha_mandato" value="{{old('fecha_mandato')}}" required>
                    <small>{{$errors->first('fecha_mandato')}}</small>
                </div> --}}

                <div class="form-group col-auto mx-4">
                    <label>Nombre del banco:</label><br>
                    <input type="text" name="nombre_banco" value="{{old('nombre_banco')}}" required>
                    <small>{{$errors->first('nombre_banco')}}</small>
                </div>

                <div class="form-group mx-4">
                    <label>Dirección del banco:</label><br>
                    <input type="text" name="direccion_banco" value="{{old('direccion_banco')}}" required>
                    <small>{{$errors->first('direccion_banco')}}</small>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-auto mx-4">
                    <label>Población del banco:</label><br>
                    <input type="text" name="poblacion_banco" value="{{old('poblacion_banco')}}" required>
                    <small>{{$errors->first('poblacion_banco')}}</small>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Facturar Empresa:</label><br>
                    <input type="text" name="facturar_empresa" value="{{old('facturar_empresa')}}" required>
                    <small>{{$errors->first('facturar_empresa')}}</small>
                </div>
            </div>

            <button type="submit" class="btn btn-danger ml-3">Crear facturación</button>
        </form>
    </x-slot>
</x-menu-grupos>
