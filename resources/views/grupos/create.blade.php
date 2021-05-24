<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger">Grupos</a> >
            <a href="{{route('grupos.create')}}" class="text-danger">Crear Grupo</a> >
        </div>
        <style>
            select {
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

            label::after {
                content: " *";
                color: red;
            }

        </style>
        <form action="{{route('grupos.store')}}" method="POST" class="mt-4 border p-5">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6 mx-4">
                    <label>Nombre:</label>
                    <input required type="text" name="nombre" class="form-control" value="{{old('nombre')}}"
                        placeholder="Nombre del grupo">
                    <small>{{$errors->first('nombre')}}</small>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-auto mx-4">
                    <div class="row">
                        <div class="col">
                            <label>Profesor:</label><br>
                            <select name="id_profesor" required>
                                <option>Seleccione un profesor...</option>
                                @foreach($profesores as $item)
                                <option value="{{$item->id}}" @if(old('id_profesor')==$item->id) selected @endif>{{$item->apellidos}} {{$item->nombre}}</option>
                                @endforeach
                            </select>
                            <small>{{$errors->first('id_profesor')}}</small>
                        </div>
                        <div class="col">
                            <label>Espacio:</label><br>
                            <select name="id_espacio" required>
                                <option>Seleccione un espacio...</option>
                                @foreach($espacios as $item)
                                <option value="{{$item->id}}" @if(old('id_espacio')==$item->id) selected @endif>P:{{$item->planta}} - {{$item->nombre}}</option>
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
                    <input required type="text" name="nombre_actividad" value="{{old('nombre_actividad')}}">
                    <small>{{$errors->first('nombre_actividad')}}</small>
                </div>
                <div class="form-group mx-4">
                    <label>Categoría:</label><br>
                    <select name="id_categoria" required>
                        <option>Seleccione la categoría...</option>
                        @foreach ($categorias as $item)
                        <option value="{{$item->id}}" @if(old('id_categoria')==$item->id) selected @endif>{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    <small>{{$errors->first('id_categoria')}}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Descripción:</label><br>
                    <textarea cols="60" required name="descripcion">{{old('descripcion')}}</textarea>
                    <small>{{$errors->first('descripcion')}}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group mx-4">
                    <label>Horas:</label><br>
                    <input required type="number" name="horas" value="{{old('horas')}}">
                    <small>{{$errors->first('horas')}}</small>
                </div>
                <div class="form-group mx-4">
                    <label>Asistencia:</label><br>
                    <select name="asistencia" required>
                      <option>Seleccione el tipo de asistencia</option>
                        <option value="presencial">Presencial</option>
                        <option value="no presencial">No Presencial</option>
                    </select>
                    <small>{{$errors->first('asistencia')}}</small>
                </div>
                <div class="form-group mx-4">
                    <label>Anio académico:</label><br>
                    <input required type="text" name="anio_academico" value="{{old('anio_academico')}}">
                    <small>{{$errors->first('anio_academico')}}</small>
                </div>


            </div>
            <button type="submit" class="btn btn-danger ml-3">Crear grupo</button>
        </form>

    </x-slot>
</x-menu-grupos>
