<x-menu-grupos>
	<x-slot name="slot">
    <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
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
		<h1 align="center">{{$alumno->nombre}}&nbsp;{{$alumno->apellidos}}</h1>
		<div class="card text-center border-danger mr-3">
            <div class="card-header">
                <img class="img-fluid rounded" src="{{asset($alumno->foto)}}" width="300px" height="300px" alt="Foto">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col ml-2">
                        <span class="row"><b>DNI:</b>&nbsp;{{$alumno->dni}}</span>
                        <span class="row"><b>Domicilio:</b>&nbsp;{{$alumno->domicilio}}</span>
                        <span class="row"><b>Poblacion:</b>&nbsp;{{$alumno->poblacion}}</span>
                        <span class="row"><b>Provincia:</b>&nbsp;{{$alumno->provincia}}</span>
                        <span class="row"><b>Pais:</b>&nbsp;{{$alumno->pais}}</span>
                    </div>
                    <div class="col">
                        <span class="row"><b>Cod Postal:</b>&nbsp;{{$alumno->codigo_postal}}</span>
                        <span class="row"><b>Sexo:</b>&nbsp;{{$alumno->sexo}}</span>
                        <span class="row"><b>Tel&eacute;fono:</b>&nbsp;{{$alumno->telefono}}</span>
                        <span class="row"><b>Tel&eacute;fono 2:</b>&nbsp;{{$alumno->telefono2}}</span>
                        <span class="row"><b>Email:</b>&nbsp;{{$alumno->email}}</span>
                    </div>
                    <div class="col">
                        <span class="row"><b>Email 2:</b>&nbsp;{{$alumno->email2}}</span>
                        <span class="row"><b>Edad:</b>&nbsp;{{$alumno->edad}}</span>
                        <span class="row"><b>Fecha Nacimiento:</b>&nbsp;{{$alumno->fecha_nacimiento}}</span>
                        <span class="row"><b>Lugar Nacimiento:</b>&nbsp;{{$alumno->lugar_nacimiento}}</span>
                        <span class="row"><b>Nº Seguridad:</b>&nbsp;{{$alumno->nss}}</span>
                    </div>
                </div>
                <div class="container">
                    <b>Observaciones</b>
                    <textarea class="form-control bg-transparent" readonly>{{$alumno->observaciones}}</textarea>
                </div>                
            </div>
        </div>

	</x-slot>
</x-menu-grupos>
