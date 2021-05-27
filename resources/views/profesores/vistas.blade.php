<x-menu-grupos>
    <x-slot name="slot">
        <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
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
    
        <form @if($profesor->nombre!=null) action="{{route('profesores.update', $profesor)}}" @else
            action="{{route('profesores.store')}}" @endif enctype="multipart/form-data" method="POST"
            onsubmit="disableButton(this)">
            @csrf
            @if($profesor->nombre!=null)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 col-xs-9">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#list-home" role="tab" aria-controls="profile">
                                <img src="https://e7.pngegg.com/pngimages/590/797/png-clipart-computer-icons-avatar-person-avatar-white-heroes.png"
                                    class="card-img-top" alt="Foto Perfil">
                            </a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#list-home" role="tab" aria-controls="profile">Datos Personales</a>
                            <a class="list-group-item list-group-item-action" id="list-direccion-list" data-toggle="list"
                                href="#list-direccion" role="tab" aria-controls="direccion">Dirección</a>
                            <a class="list-group-item list-group-item-action" id="list-pago-list" data-toggle="list"
                                href="#list-pago" rol="tab" aria-controls="pago">Pago</a>
                            <a class="list-group-item list-group-item-action" href="{{route('facturaciones.index', ["id_profesor=$profesor->id"])}}">Facturaciones</a>
                            <a class="list-group-item list-group-item-action" href="{{route('salarios.index', ["id_profesor=$profesor->id"])}}">Salarios</a>
                            <a class="list-group-item list-group-item-action"href="{{route('titulaciones.index', ["id_profesor=$profesor->id", "profesor=$profesor->nombre $profesor->apellidos"])}}">Titulaciones</a>
                        </div>
                    </div>
                    <div class="col-sm-9 mt-2 col-xs-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                aria-labelledby="list-profile-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <table class="table table-sm">
                                            <tr>
                                                <td colspan="2">
                                                    <b>Nombre:</b>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="nombre" value="{{$profesor->nombre}}">
                                                    <small>{{$errors->first('nombre')}}</small>
                                                </td>
                                                <td colspan="3">
                                                    <b>Apellidos:</b>
                                                    <input type="text" class="form-control" id="apellidos"
                                                        name="apellidos" placeholder="apellido"
                                                        value="{{$profesor->apellidos}}">
                                                    <small>{{$errors->first('apellidos')}}</small></h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>DNI:</b>
                                                    <input type="text" class="form-control" id="dni" name="dni"
                                                        placeholder="DNI" value="{{$profesor->dni}}">
                                                    <small>{{$errors->first('dni')}}</small>
                                                <td>
                                                <td>
                                                    <b>Sexo:</b><br>
                                                    <select name="sexo" required>
                                                        <option value="">Selec. sexo...</option>
                                                        <option value="Hombre" @if($profesor->sexo=="Hombre") selected @endif>Hombre</option>
                                                        <option value="Mujer" @if($profesor->sexo=="Mujer") selected @endif>Mujer</option>
                                                        <option value="Otro" @if($profesor->sexo=="Otro") selected @endif>Otro</option>
                                                    </select>
                                                    <small>{{$errors->first('sexo')}}</small>
                                                </td>
                                                <td>
                                                    <b>Fecha Nacimiento:</b>
                                                    <input type="date" class="form-control w-40" name="fecha_nacimiento"
                                                        value="{{date("Y-m-d", $profesor->fecha_nacimiento)}}" max={{date("Y-m-d", now()->getTimestamp())}}>
                                                    <small>{{$errors->first('fecha_nacimiento')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Edad:</b>
                                                    <input type="number" class="form-control w-40"
                                                        name="edad" placeholder="Telefono"
                                                        value="{{$profesor->edad}}">
                                                    <small>{{$errors->first('edad')}}</small>
                                                <td>
                                                <td>
                                                    <b>Teléfono:</b>
                                                    <input type="text" class="form-control w-40" id="telefono"
                                                        name="telefono" placeholder="Telefono"
                                                        value="{{$profesor->telefono}}">
                                                    <small>{{$errors->first('telefono')}}</small>
                                                </td>
                                                <td colspan="">
                                                    <b>Teléfono 2:</b>
                                                    <input type="text" class="form-control w-40" id="telefono2"
                                                        name="telefono2" placeholder="Telefono2"
                                                        value="{{$profesor->telefono2}}">
                                                    <small>{{$errors->first('telefono2')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Email:</b>
                                                    <input type="text" class="form-control w-40" id="email" name="email"
                                                        placeholder="Email" value="{{$profesor->email}}">
                                                    <small>{{$errors->first('email')}}</small>
                                                </td>
                                                <td>
                                                    <b>Lugar de Nacimiento:</b>
                                                    <input type="text" class="form-control w-40" name="lugar_nacimiento"
                                                        placeholder="Lugar de Nacimiento" value="{{$profesor->lugar_nacimiento}}">
                                                    <small>{{$errors->first('lugar_nacimiento')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Email 2:</b>
                                                    <input type="text" class="form-control w-40" name="email2"
                                                        placeholder="Email 2" value="{{$profesor->email2}}">
                                                    <small>{{$errors->first('email2')}}</small>
                                                </td>
                                                <td>
                                                    <b>Nº Seguri. Social:</b>
                                                    <input type="text" class="form-control w-40" id="nss" name="nss"
                                                        placeholder="NSS" value="{{$profesor->nss}}">
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
                                aria-labelledby="list-direccion-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Dirección</h5>
                                        <table class="table">
                                            <tr>
                                                <td colspan="3">
                                                    <b>Domicilio:</b>
                                                    <input type="text" class="form-control w-40" id="codigo_postal"
                                                        name="domicilio" placeholder="Código Postal"
                                                        value="{{$profesor->domicilio}}">
                                                    <small>{{$errors->first('domicilio')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Código Postal:</b>
                                                    <input type="text" class="form-control w-40" id="codigo_postal"
                                                        name="codigo_postal" placeholder="Código Postal"
                                                        value="{{$profesor->codigo_postal}}">
                                                    <small>{{$errors->first('codigo_postal')}}</small>
                                                <td>
                                                <td>
                                                    <b>Provincia:</b>
                                                    <input type="text" class="form-control" id="provincia"
                                                        name="provincia" placeholder="Provincia"
                                                        value="{{$profesor->provincia}}">
                                                    <small>{{$errors->first('provincia')}}</small>
                                                <td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <b>País:</b>
                                                    <input type="text" class="form-control" id="pais" name="pais"
                                                        placeholder="Pais" value="{{$profesor->pais}}">
                                                    <small>{{$errors->first('pais')}}</small>
                                                </td>
                                                <td colspan="2">
                                                    <b>Población:</b>
                                                    <input type="text" class="form-control" name="poblacion"
                                                        placeholder="Po" value="{{$profesor->poblacion}}">
                                                    <small>{{$errors->first('poblacion')}}</small>
                                                </td>
                                            </tr>
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-pago" role="tabpanel"
                                aria-labelledby="list-pago-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Pago</h5>
                                        <table class="table">
                                            <tr>
                                                <td colspan="4">
                                                    <b>Forma de Pago:</b>
                                                    <input type="text" class="form-control w-40" id="forma_pago"
                                                        name="forma_pago" placeholder="Forma Pago"
                                                        value="{{$profesor->forma_pago}}">
                                                    <small>{{$errors->first('forma_pago')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <b>Entidad de Ingreso:</b>
                                                    <input type="text" class="form-control" name="entidad_ingreso"
                                                        placeholder="Entidad Ingreso" value="{{$profesor->entidad_ingreso}}">
                                                    <small>{{$errors->first('entidad_ingreso')}}</small>
                                                </td>
                                                <td>
                                                    <b>Swift:</b>
                                                    <input type="text" class="form-control" id="swift"
                                                        name="swift" placeholder="Swift"
                                                        value="{{$profesor->swift}}">
                                                    <small>{{$errors->first('swift')}}</small>
                                                <td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>IBAN:</b>
                                                    <input type="text" class="form-control" id="iban"
                                                        name="iban" placeholder="IBAN"
                                                        value="{{$profesor->iban}}">
                                                    <small>{{$errors->first('iban')}}</small>
                                                <td>
                                            </tr>
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>       
                            </div>
                            <div class="tab-pane fade" id="list-facturaciones" role="tabpanel"
                                aria-labelledby="list-facturaciones-list">
                                    
                            </div>
                            <div class="tab-pane fade" id="list-salarios" role="tabpanel"
                                aria-labelledby="list-salarios-list">
                                    
                            </div>
                            <div class="tab-pane fade" id="list-titulaciones" role="tabpanel"
                                aria-labelledby="list-titulaciones-list">
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger mt-1" style="margin-left: 50%;">Modificar
                profesor</button>
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