<x-menu-grupos>
    <x-slot name="slot">
        <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
        </div>
        <small>{{$errors->first('slot')}}</small>
        <style>
            b:not(.no)::after {
                content: " *";
                color: red;
            }
            
            select{
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

            .list-group-item.active{
                background-color: red;
                border-color: rgb(202, 17, 17);
            }

        </style>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <form @if($alumno->nombre!=null) action="{{route('alumnos.update', $alumno)}}" @else
            action="{{route('alumnos.store')}}" @endif enctype="multipart/form-data" method="POST"
            onsubmit="disableButton(this)">
            @csrf
            @if($alumno->nombre!=null)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 col-xs-9">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action">
                                <img src="https://e7.pngegg.com/pngimages/590/797/png-clipart-computer-icons-avatar-person-avatar-white-heroes.png"
                                    class="card-img-top" alt="Foto Perfil">
                            </a>
                            <a class="list-group-item list-group-item-action show active" id="list-profile-list" data-toggle="list"
                                href="#list-home" role="tab" aria-controls="profile">Datos Personales</a>

                            <a class="list-group-item list-group-item-action" id="list-direccion-list" data-toggle="list"
                                href="#list-direccion" role="tab" aria-controls="direccion">Dirección</a>
                            <a class="list-group-item list-group-item-action" 
                            href="{{route('matriculas.matriculas_alumno', ['id_alumno='.$alumno->id])}}">Matrículas</a>
                            <a class="list-group-item list-group-item-action" 
                            href="{{route('prescripciones.prescripciones_alumno', ['id_alumno='.$alumno->id])}}">Prescripciones</a>
                            <a class="list-group-item list-group-item-action" 
                            href="{{route('alumnos.ver_actividades', ['id_alumno='.$alumno->id])}}">Actividades</a>
                            <a class="list-group-item list-group-item-action" href="{{route('tutores.index', ["id_alumno=$alumno->id", "alumno=$alumno->nombre $alumno->apellidos"])}}">Tutores</a>
                            <a class="list-group-item list-group-item-action" href="{{route('asistencia.verlista', [$alumno, "id_alumno=$alumno->id"])}}">Asistencias</a>
                        </div>
                    </div>
                    <div class="col-sm-9 mt-2 col-xs-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <table class="table table-sm">
                                            <tr>
                                                <td colspan="2">
                                                    <b>Nombre:</b>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="nombre" value="{{$alumno->nombre}}">
                                                    <small>{{$errors->first('nombre')}}</small>
                                                </td>
                                                <td colspan="3">
                                                    <b>Apellidos:</b>
                                                    <input type="text" class="form-control" id="apellidos"
                                                        name="apellidos" placeholder="apellido"
                                                        value="{{$alumno->apellidos}}">
                                                    <small>{{$errors->first('apellidos')}}</small></h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>DNI:</b>
                                                    <input type="text" class="form-control" id="dni" name="dni"
                                                        placeholder="DNI" value="{{$alumno->dni}}">
                                                    <small>{{$errors->first('dni')}}</small>
                                                <td>
                                                <td>
                                                    <b>Sexo:</b><br>
                                                    <select name="sexo" required>
                                                        <option>Selec. sexo...</option>
                                                        <option value="Hombre" @if($alumno->sexo=="Hombre") selected @endif>Hombre</option>
                                                        <option value="Mujer" @if($alumno->sexo=="Mujer") selected @endif>Mujer</option>
                                                        <option value="Otro" @if($alumno->sexo=="Otro") selected @endif>Otro</option>
                                                    </select>
                                                    <small>{{$errors->first('sexo')}}</small>
                                                </td>
                                                <td>
                                                    <b>Fecha Nacimiento:</b>
                                                    <input type="date" class="form-control w-40" name="fecha_nacimiento"
                                                        value="{{date("Y-m-d", $alumno->fecha_nacimiento)}}" max={{date("Y-m-d", now()->getTimestamp())}}>
                                                    <small>{{$errors->first('fecha_nacimiento')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Edad:</b>
                                                    <input type="number" class="form-control w-40"
                                                        name="edad" placeholder="Telefono"
                                                        value="{{$alumno->edad}}">
                                                    <small>{{$errors->first('edad')}}</small>
                                                <td>
                                                <td>
                                                    <b>Teléfono:</b>
                                                    <input type="text" class="form-control w-40" id="telefono"
                                                        name="telefono" placeholder="Telefono"
                                                        value="{{$alumno->telefono}}">
                                                    <small>{{$errors->first('telefono')}}</small>
                                                </td>
                                                <td colspan="">
                                                    <b>Teléfono 2:</b>
                                                    <input type="text" class="form-control w-40" id="telefono2"
                                                        name="telefono2" placeholder="Telefono2"
                                                        value="{{$alumno->telefono2}}">
                                                    <small>{{$errors->first('telefono2')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Email:</b>
                                                    <input type="text" class="form-control w-40" id="email" name="email"
                                                        placeholder="Email" value="{{$alumno->email}}">
                                                    <small>{{$errors->first('email')}}</small>
                                                </td>
                                                <td>
                                                    <b>Lugar de Nacimiento:</b>
                                                    <input type="text" class="form-control w-40" name="lugar_nacimiento"
                                                        placeholder="Lugar de Nacimiento" value="{{$alumno->lugar_nacimiento}}">
                                                    <small>{{$errors->first('lugar_nacimiento')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Email 2:</b>
                                                    <input type="text" class="form-control w-40" name="email2"
                                                        placeholder="Email 2" value="{{$alumno->email2}}">
                                                    <small>{{$errors->first('email2')}}</small>
                                                </td>
                                                <td>
                                                    <b>Nº Seguri. Social:</b>
                                                    <input type="text" class="form-control w-40" id="nss" name="nss"
                                                        placeholder="NSS" value="{{$alumno->nss}}">
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
                            <div class="tab-pane fade" id="list-direccion" role="tabpanel"
                                aria-labelledby="list-profile-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Dirección</h5>
                                        <table class="table">
                                            <tr>
                                                <td colspan="3">
                                                    <b>Domicilio:</b>
                                                    <input type="text" class="form-control w-40" id="codigo_postal"
                                                        name="domicilio" placeholder="Código Postal"
                                                        value="{{$alumno->domicilio}}">
                                                    <small>{{$errors->first('domicilio')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Código Postal:</b>
                                                    <input type="text" class="form-control w-40" id="codigo_postal"
                                                        name="codigo_postal" placeholder="Código Postal"
                                                        value="{{$alumno->codigo_postal}}">
                                                    <small>{{$errors->first('codigo_postal')}}</small>
                                                <td>
                                                <td>
                                                    <b>Provincia:</b>
                                                    <input type="text" class="form-control" id="provincia"
                                                        name="provincia" placeholder="Provincia"
                                                        value="{{$alumno->provincia}}">
                                                    <small>{{$errors->first('provincia')}}</small>
                                                <td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <b>País:</b>
                                                    <input type="text" class="form-control" id="pais" name="pais"
                                                        placeholder="Pais" value="{{$alumno->pais}}">
                                                    <small>{{$errors->first('pais')}}</small>
                                                </td>
                                                <td colspan="2">
                                                    <b>Población:</b>
                                                    <input type="text" class="form-control" name="poblacion"
                                                        placeholder="Po" value="{{$alumno->poblacion}}">
                                                    <small>{{$errors->first('poblacion')}}</small>
                                                </td>
                                            </tr>
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                    aria-labelledby="list-messages-list"></div>
                                <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                    aria-labelledby="list-settings-list"></div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                    aria-labelledby="list-messages-list"></div>
                                <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                    aria-labelledby="list-settings-list"></div>
                            </div>
                            <div class="tab-pane fade" id="list-matricula" role="tabpanel"
                                    aria-labelledby="list-matriculas-list">           
                            </div>
                            <div class="tab-pane fade" id="list-prescripciones" role="tabpanel"
                                aria-labelledby="list-prescripciones-list"></div>
                            <div class="tab-pane fade" id="list-tutores" role="tabpanel"
                                aria-labelledby="list-tutores-list"></div>
                            <div class="tab-pane fade" id="list-asistencias" role="tabpanel"
                                aria-labelledby="list-asistencias-list"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger mt-1" style="margin-left: 50%;">Modificar
                alumno</button>
        </form>
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
    </x-slot>
</x-menu-grupos>
