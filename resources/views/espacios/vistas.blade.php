<x-menu-grupos>
    <x-slot name="slot">
        <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
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
                background-color: #dc3545;
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
    
        <form @if($espacio->nombre!=null) action="{{route('espacios.update', $espacio)}}" @else
            action="{{route('espacios.store')}}" @endif enctype="multipart/form-data" method="POST"
            onsubmit="disableButton(this)">
            @csrf
            @if($espacio->nombre!=null)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 col-xs-9">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action show active" id="list-espacio-list" data-toggle="list"
                                href="#list-espacio" role="tab" aria-controls="espacio">Espacios</a>
                        </div>
                    </div>
                    <div class="col-sm-9 mt-2 col-xs-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-espacio" role="tabpanel"
                                aria-labelledby="list-espacio-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Espacios</h5>
                                        <table class="table table-sm">
                                            <tr>
                                                <td colspan="2">
                                                    <b>Nombre:</b>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="id" value="{{$espacio->nombre}}">
                                                    <small>{{$errors->first('nombre')}}</small>
                                                </td>
                                                <td colspan="2">
                                                    <b>Capacidad:</b>
                                                    <input type="text" class="form-control" id="capacidad" name="capacidad"
                                                        placeholder="nombre" value="{{$espacio->capacidad}}">
                                                    <small>{{$errors->first('capacidad')}}</small>
                                                </td>                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Planta:</b>
                                                    <input type="text" class="form-control" id="planta"
                                                        name="planta" placeholder="planta"
                                                        value="{{$espacio->planta}}">
                                                    <small>{{$errors->first('planta')}}</small></h5>
                                                </td>
                                                <td>
                                                    <b>Activo:</b><br/>
                                                    <select name="activo" required>
                                                        <option @if($espacio->activo==false) selected @endif value="false" selected>No</option>
                                                        <option @if($espacio->activo==true) selected @endif value="true">Sí</option>
                                                    </select>
                                                    <small>{{$errors->first('activo')}}</small>
                                                </td>
                                                <td>
                                                    <b>Aula Combinada</b><br/>
                                                    <select name="aula_combinada" required>
                                                        <option @if($espacio->aula_combinada==false) selected @endif value="false" selected>No</option>
                                                        <option @if($espacio->activo==true) selected @endif value="true">Sí</option>
                                                    </select>
                                                    <small>{{$errors->first('aula_combinada')}}</small>
                                                </td>
                                                <td>
                                                    <b>Turno</b><br/>
                                                    <select name="turno" required>
                                                        <option @if($espacio->turno=="mañana") selected @endif value="mañana" selected>Mañana</option>
                                                        <option @if($espacio->activo=="tarde") selected @endif value="tarde">Tarde</option>
                                                    </select>
                                                    <small>{{$errors->first('turno')}}</small>
                                                </td>
                                            </tr>
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-inventario" role="tabpanel"
                                aria-labelledby="list-inventario-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Préstamos</h5>
                                        <table class="table">                                            
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger mt-1" style="margin-left: 50%;">Guardar
                cambios</button>
        </form>
    </x-slot>
</x-menu-grupos>