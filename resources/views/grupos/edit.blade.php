<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger">Grupos</a> >
        </div>
        <style>
            select {
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

            label::after {
                content: "*";
                color: red;
            }
        </style>
        <h5 aclass="text-center">Editar Grupos</h5>
        <form action="{{route('grupos.update',$grupo)}}" method="POST" class="ml-5 mt-4 border p-5">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6 mx-4">
                    <label for="inputEmail4">Nombre:</label>
                    <input required type="text" name="nombre" class="form-control" id="inputEmail4"
                        placeholder="Nombre del grupo" value="{{$grupo->nombre}}">
                    <small>{{$errors->first('nombre')}}</small>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-auto mx-4">
                    <div class="row">
                        <div class="col">
                            <label>Profesor:</label><br>
                            <select name="id_profesor" required>
                                <option>Selecciones un profesor...</option>
                                @foreach($profesores as $item)
                                <option value="{{$item->id}}" @if($item->id==$grupo->id_profesor) selected
                                    @endif>{{$item->apellidos}} {{$item->nombre}}</option>
                                @endforeach
                            </select>
                            <small>{{$errors->first('id_profesor')}}</small>
                        </div>
                        <div class="col">
                            <label>Espacio:</label><br>
                            <select name="id_espacio" required>
                                <option>Seleccione un espacio..</option>
                                @foreach($espacios as $item)
                                <option value="{{$item->id}}" @if($item->id==$grupo->id_espacio) selected
                                    @endif>P:{{$item->planta}} - {{$item->nombre}}</option>
                                @endforeach
                            </select>
                            <small>{{$errors->first('id_espacio')}}</small>

                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Nombre de la Actividad:</label><br>
                    <input required type="text" name="nombre_actividad" value="{{$actividad->nombre}}">
                    <small>{{$errors->first('nombre_actividad')}}</small>
                </div>
                <div class="form-group mx-4">
                    <label>Categoría:</label><br>
                    <select name="id_categoria" required>
                        <option>Seleccione la categoría...</option>
                        @foreach ($categorias as $item)
                        <option value="{{$item->id}}" @if($actividad->id_categoria==$item->id) selected
                            @endif>{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    <small>{{$errors->first('id_categoria')}}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Descripción:</label><br>
                    <textarea cols="60" required name="descripcion">{{$actividad->descripcion}}</textarea>
                    <small>{{$errors->first('descripcion')}}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Horas:</label><br>
                    <input required type="number" name="horas" value="{{$actividad->horas}}">
                    <small>{{$errors->first('horas')}}</small>
                </div>
                <div class="form-group mx-4">
                    <label>Asistencia:</label><br>
                    <select name="asistencia" required>
                        <option>Seleccione el tipo de asistencia</option>
                        <option value="presencial" @if($actividad->asistencia=='presencial') selected @endif>Presencial</option>
                        <option value="no presencial" @if($actividad->asistencia=='no presencial') selected @endif>No Presencial</option>
                    </select>
                    <small>{{$errors->first('asistencia')}}</small>
                </div>
                <div class="form-group mx-4">
                    <label>Anio académico:</label><br>
                    <input required type="text" name="anio_academico" value="{{$actividad->anio_academico}}">
                    <small>{{$errors->first('anio_academico')}}</small>
                </div>
            </div>
            <button type="submit" class="btn btn-danger ml-3">Modificar Grupo</button>
        </form>

    </x-slot>
</x-menu-grupos>
