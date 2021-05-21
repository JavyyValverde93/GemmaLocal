<x-menu-grupos>
    <x-slot name="slot">
        <style>
            label.input-custom-file input[type=file] {
                display: none;
            }

            label:not(.no)::after {
                content: "*";
                color: red;
            }
            
            select{
            font-size: 22px;
            width: auto;
            padding-right: 26px;
            }

        </style>
        <div align="center">Tutores de {{$request->alumno}}</div>
        <form action="{{route('tutores.edit', $tutor)}}" method="POST" class="ml-5 mt-4 border p-5">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_alumno" value="{{$id_alumno}}">
            <input type="hidden" name="alumno" value="{{$request->alumno}}">
            <div class="form-group">
                <label class="form-text">Nombre del Tutor</label>
                <input type="text" name="nombre" class="form-control" value="{{$tutor->nombre}}">
                <small></small>{{$errors->first('nombre')}}</small>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label class="form-text">DNI</label>
                    <input type="text" name="dni" class="form-control" value="{{$tutor->dni}}">
                    <small>{{$errors->first('dni')}}</small>
                </div>
                <div class="col">
                    <label class="form-text">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{$tutor->telefono}}">
                    <small>{{$errors->first('telefono')}}</small>
                </div>
                <div class="col">
                    <label class="form-text">Relación</label>
                    <select name="relacion" value="{{$tutor->relacion}}">
                        <small>{{$errors->first('relacion')}}</small>
                        <option>Seleccione su relación con el alumo</option>
                        <option value="Padre">Padre</option>
                        <option value="Madre">Madre</option>
                        <option value="Hermano">Hermano</option>
                        <option value="Hermana">Hermana</option>
                        <option value="Abuelo">Albuelo</option>
                        <option value="Abuela">Abuela</option>
                        <option value="Tio">Tio</option>
                        <option value="Tia">Tia</option>
                        <option value="Amig@">Amig@</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-text">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{$tutor->direccion}}">
                <small>{{$errors->first('direccion')}}</small>
            </div>
            <button type="submit" name="Enviar" class="btn btn-danger">Modificar Tutor</button>
        </form>

    </x-slot>
</x-menu-grupos>
