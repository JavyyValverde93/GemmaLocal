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
	  <div class="row migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        </div>
	  <h5 align="center">Profesores<h5>
		<form action="{{route('profesores.update',$profesor)}}" enctype="multipart/form-data" method="POST" class="p-5">
			@csrf
			@method('PUT')
			<div class="row justify-content-lg-center">
				<div class="col-auto">
					<table class="table table-responsive mx-auto">
						<tr>
							<td>
								<div class="form-group">
									<label for="nombre" class="form-text">Nombre</label>
									<input type="text" name="nombre" class="form-control" value="{{$profesor->nombre}}">
								</div>
								<div class="form-group">
									<label for="provincia" class="form-text">Provincia</label>
									<input type="text" class="form-control" name="provincia" value="{{$profesor->provincia}}">
								</div>
								<div class="form-group">
									<label for="telefono2" class="form-text no">Tel&eacute;fono 2</label>
									<input class="form-control flechas" name="telefono2" value="{{$profesor->telefono2}}">
								</div>
								<div class="form-group">
									<label for="l_nacimiento" class="form-text">Lugar Nacimiento</label>
									<input type="text" class="form-control" name="lugar_nacimiento" value="{{$profesor->lugar_nacimiento}}">
								</div>
								<div class="form-group">	
									<label for="c_ingreso" class="form-text no">Cuenta Ingreso</label>
									<input type="text" class="form-control" name="cuenta_ingreso" value="{{$profesor->cuenta_ingreso}}">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label class="form-text">Apellidos</label>
									<input type="text" name="apellidos" class="form-control" value="{{$profesor->apellidos}}">
								</div>
								<div class="form-group">
									<label for="pais" class="form-text">Pa&iacute;s</label>
									<input type="text" class="form-control" name="pais" value="{{$profesor->pais}}">
								</div>
								<div class="form-group">
									<label for="email" class="form-text">Email</label>
									<input type="email" class="form-control" name="email" value="{{$profesor->email}}">
								</div>
								<div class="form-group">
									<label for="nss" class="form-text no">Nº Seguridad Social</label>
									<input type="number" class="form-control" name="nss" value="{{$profesor->nss}}">
								</div>
								<div class="form-group">
									<label for="swift" class="form-text no">Swift</label>
									<input type="number" class="form-control" name="swift" value="{{$profesor->swift}}">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="poblacion" class="form-text">Poblacion</label>
									<input type="text" name="poblacion" class="form-control" value="{{$profesor->poblacion}}">
								</div>
								<div class="form-group">
									<label for="cod_postal" class="form-text">Código Postal</label>
									<input type="number" class="form-control" name="codigo_postal" maxlength="5" minlength="5" value="{{$profesor->codigo_postal}}">
								</div>
								<div class="form-group">
									<label for="email2" class="form-text no">Email 2</label>
									<input type="text" class="form-control" name="email2" value="{{$profesor->email2}}">
								</div>
								<div class="form-group">
									<label for="observaciones" class="form-text no">Observaciones</label>
									<input type="text" class="form-control" name="observaciones" value="{{$profesor->observaciones}}">
								</div>
								<div class="form-group">
									<label for="iban" class="form-text no">IBAN</label>
									<input type="text" class="form-control" name="iban" value="{{$profesor->iban}}">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="domicilio" class="form-text">Domicilio</label>
									<input type="text" name="domicilio" class="form-control" value="{{$profesor->domicilio}}">
								</div>
								<div class="form-group">
									<label for="sexo" class="form-text">Sexo</label>
									<input type="text" class="form-control" name="sexo" value="{{$profesor->sexo}}">
								</div>
								<div class="form-group">
									<label class="form-text">Fecha Nacimiento</label>
									<input type="date" class="form-control bg-white" name="fecha_nacimiento" value="{{date("Y-m-d", $profesor->fecha_nacimiento)}}">
								</div>
								<div class="form-group">
									<label for="f_pago" class="form-text no">Forma Pago</label>
									<input type="text" class="form-control" name="forma_pago" value="{{$profesor->forma_pago}}">
								</div>
								<div class="form-group">
									<label for="impuesto" class="form-text no">Impuesto</label>
									<input type="text" class="form-control" name="impuesto" value="{{$profesor->impuesto}}">
								</div>
							</td>
							<td>
								
								<div class="form-group">
									<label for="foto" class="form-text no">Foto</label>
									<input class="form-control" type="file" name="foto">
								</div>
								<div class="form-group">
									<label for="telefono" class="form-text">Teléfono</label>
									<input type="number" class="form-control" name="telefono" value="{{$profesor->telefono}}">
								</div>
								<div class="form-group">
									<label for="edad" class="form-text">Edad</label>
									<input class="form-control flechas" name="edad" value="{{$profesor->edad}}">
								</div>
								<div class="form-group">
									<label for="e_ingreso" class="form-text no">Entidad de Ingreso</label>
									<input type="text" class="form-control" name="entidad_ingreso" value="{{$profesor->entidad_ingreso}}">
								</div>
								<div class="form-group">
									<label for="irpf" class="form-text no">IRPF</label>
									<input type="text" class="form-control" name="irpf" value="{{$profesor->irpf}}">
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<button type="submit" name="Enviar" class="btn btn-danger">Actualizar profesor</button>
		</form>

	</x-slot>
</x-menu-grupos>