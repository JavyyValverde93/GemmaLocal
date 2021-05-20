<x-menu-grupos>
    <x-slot name="slot">
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
        <form class="ml-5 mt-4 border p-5" style="width: 1200px">
            <div class="form-row">
                <div class="form-group col-md-6 mx-4">
                    <label for="inputEmail4">Forma de pago:</label>
                    <input type="text" name="forma_pago" class="form-control" id="inputEmail4"
                        placeholder="Forma de pago">
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-auto mx-4">
                    <label>Número de tarjeta:</label>
                    <input type="number" step="1" required name="num_tarjeta" value="{{old('num_tarjeta')}}"
                        class="form-control" placeholder="Número de tarjeta">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-auto mx-4">
                    <label>Caducidad:</label><br>
                    <input type="number" min="01" max="12" step="1" name="caducidad" size="2"> / <input type="number"
                        step="1" min="21" max="50" name="caducidad2" maxlength="2">
                </div>

                <div class="form-group col-auto mx-4">
                    <label class="no">Descripción:</label><br>
                    <textarea name="descripcion" cols="30" rows="3" required></textarea>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Tarifa Asignada:</label><br>
                    <input type="text" name="tarifa_asignada" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Riesgo máximo:</label><br>
                    <input type="text" name="riesgo_maximo" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Día pago:</label><br>
                    <input type="number" name="dia_pago" step="1" min="1" max="31" required>
                </div>

                <div class="form-grou col-auto mx-4">
                    <label>Descuento:</label><br>
                    <input type="number" step="1" min="0" max="100" name="descuento" required>%
                </div>

            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Precio/hora:</label><br>
                    <input type="number" name="precio_hora" step="0.01" min="0" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Subcuenta contable:</label><br>
                    <input type="text" name="subcuenta_contable">
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Titular de la cuenta:</label><br>
                    <input type="text" name="titular_cuenta" required>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>DNI titular:</label><br>
                    <input type="text" name="dni_titular" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Nacionalidad del titular:</label><br>
                    <input type="text" name="dia_pago" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Email del titular:</label><br>
                    <input type="email" name="email_titular" required>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Cuenta:</label><br>
                    <input type="text" name="cuenta" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Iban:</label><br>
                    <input type="text" name="iban" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Mandato sepa:</label><br>
                    <input type="text" name="mandato_sepa" required>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Swift:</label><br>
                    <input type="number" name="swift" step="1" min="0" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Fecha mandato:</label><br>
                    <input data-provide="datepicker" name="fecha_mandato" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Nombre del banco:</label><br>
                    <input type="text" name="nombre_banco" required>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group mx-4">
                    <label>Dirección del banco:</label><br>
                    <input type="text" name="direccion_banco" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Población del banco:</label><br>
                    <input type="text" name="poblacion_banco" required>
                </div>

                <div class="form-group col-auto mx-4">
                    <label>Facturar Empresa:</label><br>
                    <input type="text" name="facturar_empresa" required>
                </div>
            </div>

            <button type="submit" class="btn btn-danger ml-3">Crear facturación</button>
        </form>
    </x-slot>
</x-menu-grupos>
