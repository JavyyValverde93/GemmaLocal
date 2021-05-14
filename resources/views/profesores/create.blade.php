<x-menu-grupos>
	<x-slot name="slot">
		<style>
			input[type=number]::-webkit-outer-spin-button,
			input[type=number]::-webkit-inner-spin-button {
				-webkit-appearance: none;
				margin: 0;
			}
	
			input[type=number] {
				-moz-appearance: textfield;
			}
		</style>
		<h1 class="text-center">Profesor</h1>
		<form class="ml-5 mt-4 border p-5">
			<div class="row justify-content-lg-center">
				<div class="col-auto">
					<table class="table table-responsive mx-auto">
						<tr>
							<td>
								<div class="form-group">
									<label for="nombre" class="form-text">Nombre</label>
									<input type="text" name="nombre" class="form-control text-right">
								</div>
								<div class="form-group">
									<label for="provincia" class="form-text">Provincia</label>
									<input type="text" class="form-control text-right" name="provincia">
								</div>
								<div class="form-group">
									<label for="telefono2" class="form-text">Tel&eacute;fono 2</label>
									<input class="form-control text-right flechas" name="telefono2">
								</div>
								<div class="form-group">
									<label for="l_nacimiento" class="form-text">Lugar Nacimiento</label>
									<input type="text" class="form-control text-right" name="lugar_nacimiento">
								</div>
								<div class="form-group">	
									<label for="c_ingreso" class="form-text">Cuenta Ingreso</label>
									<input type="text" class="form-control text-right" name="cuenta_ingreso">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="apellnameos" class="form-text">Apellnameos</label>
									<input type="text" name="apellnameos" class="form-control text-right">
								</div>
								<div class="form-group">
									<label for="pais" class="form-text">Pa&iacute;s</label>
									<input type="text" class="form-control text-right" name="pais">
								</div>
								<div class="form-group">
									<label for="email" class="form-text">Email</label>
									<input type="email" class="form-control text-right" name="email">
								</div>
								<div class="form-group">
									<label for="nss" class="form-text">Nº Seguridad Social</label>
									<input type="number" class="form-control text-right" name="nss">
								</div>
								<div class="form-group">
									<label for="swift" class="form-text">Swift</label>
									<input type="number" class="form-control text-right" name="swift">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="foto" class="form-text">Foto</label>
									<input type="file" name="foto" class="form-control" accept="img/*">
								</div>
								<div class="form-group">
									<label for="cod_postal" class="form-text">Código Postal</label>
									<input type="number" class="form-control text-right" name="codigo_postal" maxlength="5" minlength="5">
								</div>
								<div class="form-group">
									<label for="email2" class="form-text">Email 2</label>
									<input type="text" class="form-control text-right" name="email2">
								</div>
								<div class="form-group">
									<label for="observaciones" class="form-text">Observaciones</label>
									<input type="text" class="form-control text-right" name="observaciones">
								</div>
								<div class="form-group">
									<label for="iban" class="form-text">IBAN</label>
									<input type="text" class="form-control text-right" name="iban">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="domicilio" class="form-text">Domicilio</label>
									<input type="text" name="domicilio" class="form-control text-right">
								</div>
								<div class="form-group">
									<label for="sexo" class="form-text">Sexo</label>
									<input type="text" class="form-control text-right" name="sexo">
								</div>
								<div class="form-group">
									<label for="edad" class="form-text">Edad</label>
									<input class="form-control text-right flechas" name="edad">
								</div>
								<div class="form-group">
									<label for="f_pago" class="form-text">Forma Pago</label>
									<input type="text" class="form-control text-right" name="forma_pago">
								</div>
								<div class="form-group">
									<label for="impuesto" class="form-text">Impuesto</label>
									<input type="text" class="form-control text-right" name="impuesto">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="poblacion" class="form-text">Poblacion</label>
									<input type="text" name="poblacion" class="form-control text-right">
								</div>
								<div class="form-group">
									<label for="telefono" class="form-text">Teléfono</label>
									<input type="number" class="form-control text-right" name="telefono">
								</div>
								<div class="form-group">
									<label class="form-text">Fecha Nacimiento</label>
									<input type="date" class="form-control text-right bg-white" name="fecha_nacimiento">
								</div>
								<div class="form-group">
									<label for="e_ingreso" class="form-text">Entidad de Ingreso</label>
									<input type="text" class="form-control text-right" name="entidad_ingreso">
								</div>
								<div class="form-group">
									<label for="irpf" class="form-text">IRPF</label>
									<input type="text" class="form-control text-right" name="irpf">
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<input type="submit" name="Enviar" class="btn btn-danger">
		</form>

	</x-slot>
</x-menu-grupos>