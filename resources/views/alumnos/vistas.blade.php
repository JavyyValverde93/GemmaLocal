<x-menu-grupos>
	<x-slot name="slot">
    <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
    </div>
    <small>{{$errors->first('slot')}}</small>
		<style>
			label.input-custom-file input[type=file] {
				display: none;
			}

			label:not(.no)::after{
				content: "*";
				color: red;
			}
		</style>
        <form @if($alumno->nombre!=null) action="{{route('alumnos.update', $alumno)}}" @else action="{{route('alumnos.store')}}" @endif enctype="multipart/form-data" method="POST" onsubmit="disableButton(this)">           
            @csrf
            @if($alumno->nombre!=null)
            @method('PUT')
            @endif
            <div class="card-body">
                    <div class="row">
                    <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-home" role="tab" aria-controls="profile">
                            <img src="https://e7.pngegg.com/pngimages/590/797/png-clipart-computer-icons-avatar-person-avatar-white-heroes.png" class="card-img-top" alt="Foto Perfil">
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-home" role="tab" aria-controls="profile">Datos Personales</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-direccion" role="tab" aria-controls="profile">Dirección</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="" rol="tab" aria-controls="messages">Matrículas</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Prescripciones</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Tutores</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Asistencias</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">Datos Personales</h5>                                        
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">
                                                <b>Nombre</b>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{$alumno->nombre}}">
                                                <small>{{$errors->first('nombre')}}</small>
                                            </td>
                                            <td colspan="3">
                                                <b>Apellidos</b>
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" value="{{$alumno->apellidos}}">
                                                <small>{{$errors->first('nombre')}}</small></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>DNI:</b>
                                                <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" value="{{$alumno->dni}}">
                                                <small>{{$errors->first('dni')}}</small>
                                            <td>
                                            <td>
                                                <b>Sexo:</b>
                                                <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" value="{{$alumno->sexo}}">
                                                <small>{{$errors->first('sexo')}}</small>
                                            </td>
                                            <td>
                                                <b>Edad:</b>
                                                <input type="text" class="form-control w-40" id="edad" name="edad" placeholder="Edad" value="{{$alumno->edad}}">
                                                <small>{{$errors->first('edad')}}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Teléfono:</b>
                                                <input type="text" class="form-control w-40" id="telefono" name="telefono" placeholder="Telefono" value="{{$alumno->telefono}}">
                                                <small>{{$errors->first('telefono')}}</small>
                                            <td>
                                            <td colspan="2">
                                                <b>Teléfono 2:</b>
                                                <input type="text" class="form-control w-40" id="telefono2" name="telefono2" placeholder="Telefono2" value="{{$alumno->telefono2}}">
                                                <small>{{$errors->first('telefono2')}}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <b>Email:</b>
                                                <input type="text" class="form-control w-40" id="email" name="email" placeholder="Email" value="{{$alumno->email}}">
                                                <small>{{$errors->first('email')}}</small>
                                            </td>
                                            <td>
                                                <b>Nº Seguri. Social:</b>
                                                <input type="text" class="form-control w-40" id="nss" name="nss" placeholder="NSS" value="{{$alumno->nss}}">
                                                <small>{{$errors->first('nss')}}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </table>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list-direccion" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">Dirección</h5>
                                    <table class="table">
                                        <tr>
                                            <td colspan="3">
                                                <b>Domicilio:</b>
                                                <input type="text" class="form-control w-40" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" value="{{$alumno->domicilio}}">
                                                <small>{{$errors->first('telefono')}}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Código Postal:</b>
                                                <input type="text" class="form-control w-40" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" value="{{$alumno->codigo_postal}}">
                                                <small>{{$errors->first('telefono')}}</small>
                                            <td>
                                            <td>
                                                <b>Provincia:</b>
                                                <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="{{$alumno->provincia}}">
                                                <small>{{$errors->first('provincia')}}</small>
                                            <td>                  
                                        </tr>
                                        <tr>                                        
                                            <td colspan="2">
                                                <b>País:</b>
                                                <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="{{$alumno->pais}}">
                                                <small>{{$errors->first('pais')}}</small>
                                            </td>                                             
                                            <td colspan="2">                                                
                                            </td>
                                        </tr>
                                    </table>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"></div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"></div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"></div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"></div>
                        </div>
                    </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-danger mt-1" style="margin-left: 50%;">Modificar alumno</button>
        </form>
	</x-slot>
</x-menu-grupos>