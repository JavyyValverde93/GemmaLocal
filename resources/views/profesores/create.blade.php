<x-menu-grupos>
	<x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
			<a href="{{route('profesores.create')}}" class="text-danger">Crear Profesores</a> >
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
		<form action="{{route('profesores.store')}}" method="POST" enctype="multipart/form-data" class="p-5">
			@csrf
			<div class="row justify-content-lg-center">
				<div class="col-auto">
					<table class="table table-responsive mx-auto">
						<tr>
							<td>
								<div class="form-group">
									<label for="nombre" class="form-text">Nombre</label>
									<input type="text" name="nombre" value="{{old('nombre')}}" required class="form-control">
									<small>{{$errors->first('nombre')}}</small>
								</div>
								<div class="form-group">
									<label for="provincia" class="form-text">Provincia</label>
									<input type="text" class="form-control" name="provincia" value="{{old('provincia')}}" required>
									<small>{{$errors->first('provincia')}}</small>
								</div>
								<div class="form-group">
									<label for="telefono2" class="form-text no">Tel&eacute;fono 2</label>
									<input class="form-control flechas" name="telefono2" value="{{old('telefono2')}}" required>
									<small>{{$errors->first('telefono2')}}</small>
								</div>
								<div class="form-group">
									<label for="l_nacimiento" class="form-text">Lugar Nacimiento</label>
									<input type="text" class="form-control" name="lugar_nacimiento" value="{{old('lugar_nacimiento')}}" required>
									<small>{{$errors->first('lugar_nacimiento')}}</small>
								</div>
								<div class="form-group">	
									<label for="c_ingreso" class="form-text no">Cuenta Ingreso</label>
									<input type="text" class="form-control" name="cuenta_ingreso" value="{{old('cuenta_ingreso')}}">
									<small>{{$errors->first('cuenta_ingreso')}}</small>
								</div>
							</td>
							<td>
								<div class="form-group">
									<label class="form-text">Apellidos</label>
									<input type="text" name="apellidos" value="{{old('apellidos')}}" required class="form-control">
									<small>{{$errors->first('apellidos')}}</small>
								</div>
								<div class="form-group">
									<label for="pais" class="form-text">Pa&iacute;s</label>
									<input type="text" class="form-control" name="pais" value="{{old('pais')}}" required>
									<small>{{$errors->first('pais')}}</small>
								</div>
								<div class="form-group">
									<label for="email" class="form-text">Email</label>
									<input type="email" class="form-control" name="email" value="{{old('email')}}" required>
									<small>{{$errors->first('email')}}</small>
								</div>
								<div class="form-group">
									<label for="nss" class="form-text no">Nº Seguridad Social</label>
									<input type="number" class="form-control" name="nss" value="{{old('nss')}}" required>
									<small>{{$errors->first('nss')}}</small>
								</div>
								<div class="form-group">
									<label for="swift" class="form-text no">Swift</label>
									<input type="number" class="form-control" name="swift" value="{{old('swift')}}">
									<small>{{$errors->first('swift')}}</small>
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="poblacion" class="form-text">Poblacion</label>
									<input type="text" name="poblacion" value="{{old('poblacion')}}" required class="form-control">
									<small>{{$errors->first('poblacion')}}</small>
								</div>
								<div class="form-group">
									<label for="cod_postal" class="form-text">Código Postal</label>
									<input type="number" class="form-control" name="codigo_postal" value="{{old('codigo_postal')}}" required maxlength="5" minlength="5">
									<small>{{$errors->first('codigo_postal')}}</small>
								</div>
								<div class="form-group">
									<label for="email2" class="form-text no">Email 2</label>
									<input type="text" class="form-control" name="email2" value="{{old('email2')}}" required>
									<small>{{$errors->first('email2')}}</small>
								</div>
								<div class="form-group">
									<label for="observaciones" class="form-text no">Observaciones</label>
									<input type="text" class="form-control" name="observaciones" value="{{old('observaciones')}}" required>
									<small>{{$errors->first('observaciones')}}</small>
								</div>
								<div class="form-group">
									<label for="iban" class="form-text no">IBAN</label>
									<input type="text" class="form-control" name="iban" value="{{old('iban')}}">
									<small>{{$errors->first('iban')}}</small>
								</div>
							</td>
							<td>
								<div class="form-group">
									<label for="domicilio" class="form-text">Domicilio</label>
									<input type="text" name="domicilio" value="{{old('domicilio')}}" required class="form-control">
									<small>{{$errors->first('domicilio')}}</small>
								</div>
								<div class="form-group">
									<label for="sexo" class="form-text">Sexo</label>
									<input type="text" class="form-control" name="sexo" value="{{old('sexo')}}" required>
									<small>{{$errors->first('sexo')}}</small>
								</div>
								<div class="form-group">
									<label class="form-text">Fecha Nacimiento</label>
									<input type="date" class="form-control bg-white" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
									<small>{{$errors->first('fecha_nacimiento')}}</small>
								</div>
								<div class="form-group">
									<label for="f_pago" class="form-text no">Forma Pago</label>
									<input type="text" class="form-control" name="forma_pago" value="{{old('forma_pago')}}">
									<small>{{$errors->first('forma_pago')}}</small>
								</div>
								<div class="form-group">
									<label for="impuesto" class="form-text no">Impuesto</label>
									<input type="text" class="form-control" name="impuesto" value="{{old('impuesto')}}">
									<small>{{$errors->first('impuesto')}}</small>
								</div>
							</td>
							<td>
								
								<div class="form-group">
									<label for="foto" class="form-text no">Foto</label>
									<input class="form-control" type="file" name="foto" value="{{old('foto')}}" required>
									<small>{{$errors->first('foto')}}</small>
								</div>
								<div class="form-group">
									<label for="telefono" class="form-text">Teléfono</label>
									<input type="number" class="form-control" name="telefono" value="{{old('telefono')}}" required>
									<small>{{$errors->first('telefono')}}</small>
								</div>
								<div class="form-group">
									<label for="edad" class="form-text">Edad</label>
									<input class="form-control flechas" name="edad" value="{{old('edad')}}" required>
									<small>{{$errors->first('edad')}}</small>
								</div>
								<div class="form-group">
									<label for="e_ingreso" class="form-text no">Entidad de Ingreso</label>
									<input type="text" class="form-control" name="entidad_ingreso" value="{{old('entidad_ingreso')}}">
									<small>{{$errors->first('entidad_ingreso')}}</small>
								</div>
								<div class="form-group">
									<label for="irpf" class="form-text no">IRPF</label>
									<input type="text" class="form-control" name="irpf" value="{{old('irpf')}}">
									<small>{{$errors->first('irpf')}}</small>
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