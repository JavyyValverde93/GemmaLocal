<x-menu-grupos>
    <x-slot name="slot">
        <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger">Grupos</a> >
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
    
        <form @if($grupo->nombre!=null) action="{{route('grupos.update', $grupo)}}" @else
            action="{{route('grupos.store')}}" @endif enctype="multipart/form-data" method="POST"
            onsubmit="disableButton(this)">
            @csrf
            @if($grupo->nombre!=null)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 col-xs-9">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action show active" id="list-grupos-list" data-toggle="list"
                                href="#list-grupo" role="tab" aria-controls="grupo">Grupos</a>

                            <a class="list-group-item list-group-item-action" 
                            href="{{route('periodoscalificaciones.index')}}">Periodo Calificaciones</a>
                            <a class="list-group-item list-group-item-action" 
                            href="{{route('asistencias.index')}}">Asistencias</a>
                        </div>
                    </div>
                    <div class="col-sm-9 mt-2 col-xs-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-grupo" role="tabpanel"
                                aria-labelledby="list-grupo-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Grupos</h5>
                                        <table class="table table-sm">
                                            <tr>
                                                <td>
                                                <b>Nombre</b>
                                                <input required type="text" name="nombre" class="form-control" id="inputEmail4"
                                                    placeholder="Nombre del grupo" @if($actividad!=null) value="{{$grupo->nombre}}" @endif>
                                                <small>{{$errors->first('nombre')}}</small>
                                                </td>
                                                <td>
                                                    <b>Nombre Actividad:</b>
                                                    <input required type="text" name="nombre_actividad" @if($actividad!=null) value="{{$actividad->nombre}}" @endif>
                                                    <small>{{$errors->first('nombre_actividad')}}</small>
                                                </td>                                              
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Profesor:</b><br/>
                                                    <select name="id_profesor" required>
                                                    <option>Seleccione un profesor...</option>
                                                    @foreach($profesores as $item)
                                                    <option value="{{$item->id}}" @if($item->id==$grupo->id_profesor) selected
                                                        @endif>{{$item->apellidos}} {{$item->nombre}}</option>
                                                    @endforeach
                                                </td> 
                                                <td>
                                                    <b>Espacio:</b><br/>
                                                    <select name="id_espacio" required>
                                                        <option>Seleccione un espacio..</option>
                                                        @foreach($espacios as $item)
                                                        <option value="{{$item->id}}" @if($item->id==$grupo->id_espacio) selected
                                                            @endif>P:{{$item->planta}} - {{$item->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Categoría:</b><br/>
                                                    <select name="id_categoria" required>
                                                    <option>Seleccione la categoría...</option>
                                                    @foreach ($categorias as $item)
                                                    <option value="{{$item->id}}"@if($actividad!=null) @if($actividad->id_categoria==$item->id) selected
                                                        @endif @endif>{{$item->nombre}}</option>
                                                    @endforeach
                                                    </select>
                                                    <small>{{$errors->first('id_categoria')}}</small>
                                                </td> 
                                                <td> 
                                                    <b>Asistencia</b><br/>
                                                    <select name="asistencia" required>
                                                        <option>Seleccione el tipo de asistencia</option>
                                                        <option value="presencial"@if($actividad!=null) @if($actividad->asistencia=='presencial') selected @endif @endif>Presencial</option>
                                                        <option value="no presencial"@if($actividad!=null) @if($actividad->asistencia=='no presencial') selected @endif @endif>No Presencial</option>
                                                    </select>
                                                    </select>
                                                    <small>{{$errors->first('asistencia')}}</small>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Horas:</b><br>
                                                        <input required type="number" name="horas" value="@if($actividad!=null){{$actividad->horas}}@endif">
                                                    <small>{{$errors->first('horas')}}</small>
                                                </td>
                                                <td>
                                                    <b>Año Académico:</b><br>
                                                        <input required type="text" name="anio_academico"value="1">
                                                    <small>{{$errors->first('anio_academico')}}</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Descripción:</b><br>
                                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                                        placeholder="descripcion" value="@if($actividad!=null) {{$actividad->descripcion}} @endif">
                                                    <small>{{$errors->first('descripcion')}}</small>
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