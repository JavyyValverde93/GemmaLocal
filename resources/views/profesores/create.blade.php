<x-menu-grupos>
	<x-slot name="slot">
		<style>
			label.input-custom-file input[type=file] {
				display: none;
			}

			label:not(.no)::after{
				content: "*";
				color: red;
			}
		</style>
		<div align="center">Profesor</div>
		<form action="{{route('profesores.store')}}" method="POST" class="ml-5 mt-4 border p-5">
			@csrf
			<div class="row justify-content-lg-center">
				<div class="col-auto">
					<table class="table table-responsive mx-auto">
						<tr>
							<td>
								<div class="form-group">
									<label for="nombre" class="form-text">Nombre</label>
									<input type="text" name="nombre" class="form-control">
								</div>
								<div class="form-group">
									<label for="provincia" class="form-text">Provincia</label>
									<input type="text" class="form-control" name="provincia">
								</div>
								<div class="form-group">
									<label for="telefono2" class="form-text no">Tel&eacute;fono 2</label>
									<input class="form-control flechas" name="telefono2">
								</div>
								<div class="form-group">
									<label for="l_nacimiento" class="form-text">Lugar Nacimiento</label>
									<input type="text" class="form-control" name="lugar_nacimiento">
								</div>
								<div class="form-group">	
									<label for="c_ingreso" class="form-text no">Cuenta Ingreso</label>
									<input type="text" class="form-control" name="cuenta_ingreso">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label class="form-text">Apellidos</label>
									<input type="text" name="apellidos" class="form-control">
								</div>
								<div class="form-group">
									<label for="pais" class="form-text">Pa&iacute;s</label>
									<input type="text" class="form-control" name="pais">
								</div>
								<div class="form-group">
									<label for="email" class="form-text">Email</label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="form-group">
									<label for="nss" class="form-text no">Nº Seguridad Social</label>
									<input type="number" class="form-control" name="nss">
								</div>
								<div class="form-group">
									<label for="swift" class="form-text no">Swift</label>
									<input type="number" class="form-control" name="swift">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="poblacion" class="form-text">Poblacion</label>
									<input type="text" name="poblacion" class="form-control">
								</div>
								<div class="form-group">
									<label for="cod_postal" class="form-text">Código Postal</label>
									<input type="number" class="form-control" name="codigo_postal" maxlength="5" minlength="5">
								</div>
								<div class="form-group">
									<label for="email2" class="form-text no">Email 2</label>
									<input type="text" class="form-control" name="email2">
								</div>
								<div class="form-group">
									<label for="observaciones" class="form-text no">Observaciones</label>
									<input type="text" class="form-control" name="observaciones">
								</div>
								<div class="form-group">
									<label for="iban" class="form-text no">IBAN</label>
									<input type="text" class="form-control" name="iban">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="domicilio" class="form-text">Domicilio</label>
									<input type="text" name="domicilio" class="form-control">
								</div>
								<div class="form-group">
									<label for="sexo" class="form-text">Sexo</label>
									<input type="text" class="form-control" name="sexo">
								</div>
								<div class="form-group">
									<label for="edad" class="form-text">Edad</label>
									<input class="form-control flechas" name="edad">
								</div>
								<div class="form-group">
									<label for="f_pago" class="form-text no">Forma Pago</label>
									<input type="text" class="form-control" name="forma_pago">
								</div>
								<div class="form-group">
									<label for="impuesto" class="form-text no">Impuesto</label>
									<input type="text" class="form-control" name="impuesto">
								</div>
							</td>
							<td>
								
								<div class="form-group">
									<label for="foto" class="form-text no">Foto</label>
									<input class="form-control" type="file" name="foto">
								</div>
								<div class="form-group">
									<label for="telefono" class="form-text">Teléfono</label>
									<input type="number" class="form-control" name="telefono">
								</div>
								<div class="form-group">
									<label class="form-text">Fecha Nacimiento</label>
									<input type="date" class="form-control bg-white" name="fecha_nacimiento">
								</div>
								<div class="form-group">
									<label for="e_ingreso" class="form-text no">Entidad de Ingreso</label>
									<input type="text" class="form-control" name="entidad_ingreso">
								</div>
								<div class="form-group">
									<label for="irpf" class="form-text no">IRPF</label>
									<input type="text" class="form-control" name="irpf">
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<button type="submit" name="Enviar" class="btn btn-danger">Crear</button>
		</form>

	</x-slot>
</x-menu-grupos>