<x-menu-grupos>
	<x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        </div>
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
		<div align="center">Profesor</div>
		<form action="{{route('profesores.update',$profesor)}}" enctype="multipart/form-data" method="POST" class="ml-5 mt-4 border p-5">
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
									<small>{{$errors->first('nombre')}}</small>
								</div>
								<div class="form-group">
									<label for="provincia" class="form-text">Provincia</label>
									<input type="text" class="form-control" name="provincia" value="{{$profesor->provincia}}">
									<small>{{$errors->first('provincia')}}</small>
								</div>
								<div class="form-group">
									<label for="telefono2" class="form-text no">Tel&eacute;fono 2</label>
									<input class="form-control flechas" name="telefono2" value="{{$profesor->telefono2}}">
									<small>{{$errors->first('telefono2')}}</small>
								</div>
								<div class="form-group">
									<label for="l_nacimiento" class="form-text">Lugar Nacimiento</label>
									<input type="text" class="form-control" name="lugar_nacimiento" value="{{$profesor->lugar_nacimiento}}">
									<small>{{$errors->first('lugar_nacimiento')}}</small>
								</div>
								<div class="form-group">	
									<label for="c_ingreso" class="form-text no">Cuenta Ingreso</label>
									<input type="text" class="form-control" name="cuenta_ingreso" value="{{$profesor->cuenta_ingreso}}">
									<small>{{$errors->first('cuenta_ingreso')}}</small>
								</div>
							</td>
							<td>
								<div class="form-group">
									<label class="form-text">Apellidos</label>
									<input type="text" name="apellidos" class="form-control" value="{{$profesor->apellidos}}">
									<small>{{$errors->first('apellidos')}}</small>
								</div>
								<div class="form-group">
									<label for="pais" class="form-text">Pa&iacute;s</label>
									<input type="text" class="form-control" name="pais" value="{{$profesor->pais}}">
									<small>{{$errors->first('pais')}}</small>
								</div>
								<div class="form-group">
									<label for="email" class="form-text">Email</label>
									<input type="email" class="form-control" name="email" value="{{$profesor->email}}">
									<small>{{$errors->first('email')}}</small>
								</div>
								<div class="form-group">
									<label for="nss" class="form-text no">Nº Seguridad Social</label>
									<input type="number" class="form-control" name="nss" value="{{$profesor->nss}}">
									<small>{{$errors->first('nss')}}</small>
								</div>
								<div class="form-group">
									<label for="swift" class="form-text no">Swift</label>
									<input type="number" class="form-control" name="swift" value="{{$profesor->swift}}">
									<small>{{$errors->first('swift')}}</small>
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="poblacion" class="form-text">Poblacion</label>
									<input type="text" name="poblacion" class="form-control" value="{{$profesor->poblacion}}">
									<small>{{$errors->first('poblacion')}}</small>
								</div>
								<div class="form-group">
									<label for="cod_postal" class="form-text">Código Postal</label>
									<input type="number" class="form-control" name="codigo_postal" maxlength="5" minlength="5" value="{{$profesor->codigo_postal}}">
									<small>{{$errors->first('codigo_postal')}}</small>
								</div>
								<div class="form-group">
									<label for="email2" class="form-text no">Email 2</label>
									<input type="text" class="form-control" name="email2" value="{{$profesor->email2}}">
									<small>{{$errors->first('email2')}}</small>
								</div>
								<div class="form-group">
									<label for="observaciones" class="form-text no">Observaciones</label>
									<input type="text" class="form-control" name="observaciones" value="{{$profesor->observaciones}}">
									<small>{{$errors->first('observaciones')}}</small>
								</div>
								<div class="form-group">
									<label for="iban" class="form-text no">IBAN</label>
									<input type="text" class="form-control" name="iban" value="{{$profesor->iban}}">
									<small>{{$errors->first('iban')}}</small>
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="domicilio" class="form-text">Domicilio</label>
									<input type="text" name="domicilio" class="form-control" value="{{$profesor->domicilio}}">
									<small>{{$errors->first('domicilio')}}</small>
								</div>
								<div class="form-group">
									<label for="sexo" class="form-text">Sexo</label>
									<input type="text" class="form-control" name="sexo" value="{{$profesor->sexo}}">
									<small>{{$errors->first('sexo')}}</small>
								</div>
								<div class="form-group">
									<label class="form-text">Fecha Nacimiento</label>
									<input type="date" class="form-control bg-white" name="fecha_nacimiento" value="{{date("Y-m-d", $profesor->fecha_nacimiento)}}">
									<small>{{$errors->first('fecha_nacimiento')}}</small>
								</div>
								<div class="form-group">
									<label for="f_pago" class="form-text no">Forma Pago</label>
									<input type="text" class="form-control" name="forma_pago" value="{{$profesor->forma_pago}}">
									<small>{{$errors->first('forma_pago')}}</small>
								</div>
								<div class="form-group">
									<label for="impuesto" class="form-text no">Impuesto</label>
									<input type="text" class="form-control" name="impuesto" value="{{$profesor->impuesto}}">
									<small>{{$errors->first('impuesto')}}</small>
								</div>
							</td>
							<td>
								
								<div class="form-group">
									<label for="foto" class="form-text no">Foto</label>
									<input class="form-control" type="file" name="foto">
									<small>{{$errors->first('foto')}}</small>
								</div>
								<div class="form-group">
									<label for="telefono" class="form-text">Teléfono</label>
									<input type="number" class="form-control" name="telefono" value="{{$profesor->telefono}}">
									<small>{{$errors->first('telefono')}}</small>
								</div>
								<div class="form-group">
									<label for="edad" class="form-text">Edad</label>
									<input class="form-control flechas" name="edad" value="{{$profesor->edad}}">
									<small>{{$errors->first('edad')}}</small>
								</div>
								<div class="form-group">
									<label for="e_ingreso" class="form-text no">Entidad de Ingreso</label>
									<input type="text" class="form-control" name="entidad_ingreso" value="{{$profesor->entidad_ingreso}}">
									<small>{{$errors->first('entidad_ingreso')}}</small>
								</div>
								<div class="form-group">
									<label for="irpf" class="form-text no">IRPF</label>
									<input type="text" class="form-control" name="irpf" value="{{$profesor->irpf}}">
									<small>{{$errors->first('irpf')}}</small>
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