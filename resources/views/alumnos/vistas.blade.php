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
        <form action="http://localhost:8000/alumnos/update/50" enctype="multipart/form-data" method="POST" onsubmit="disableButton(this)">           
            <div class="card-body" style="margin-top: 100px;">
                    <div class="row">
                    <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-home" role="tab" aria-controls="profile">
                            <img src="https://e7.pngegg.com/pngimages/590/797/png-clipart-computer-icons-avatar-person-avatar-white-heroes.png" class="card-img-top" alt="Foto Perfil">
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Dirección</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Matriculas</a>
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
                                    <h5 class="card-title">&nbsp;{{$alumno->nombre}} {{$alumno->apellidos}}</h5>
                                    <table class="table">
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
                                                <b>Nº Seguridad Social:</b>
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
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Uno</div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Dos</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Tres</div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                        </div>
                    </div>
                    </div>
                </div>
        </form>
	</x-slot>
</x-menu-grupos>
