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
            font-size: 20px;
            width: auto;
            padding-right: 26px;
            }

        </style>
        <div align="center">Titulaci&oacute;n para {{$request->profesor}}</div>
        <form action="{{route('titulaciones.store')}}" method="POST" class="ml-5 mt-4 border p-5">
            @csrf
            <input type="hidden" name="id_profesor" value="{{$id_profesor}}">
            <input type="hidden" name="profesor" value="{{$request->profesor}}">
            <div class="form-group">
                <label for="titulacion" class="form-text">Titulaci&oacute;n</label>
                <input type="text" name="titulacion" value="{{old('titulacion')}}" class="form-control">
                <small>{{$errors->first('titulacion')}}</small>
            </div>
            <div class="form-group">
                <label for="especialidad" class="form-text">Especialidad</label>
                <input type="text" name="especialidad" value="{{old('especialidad')}}" class="form-control">
                <small>{{$errors->first('especialidad')}}</small>
            </div>
            
            <div class="form-group">
                <label class="form-text">Actividad</label>
                <select name="id_actividad">
                    <option>Seleccione la actividad...</option>
                    @foreach($actividades as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </select>
                <small>{{$errors->first('id_actividad')}}</small>
            </div>
            <input type="submit" name="Enviar" class="btn btn-danger">
        </form>

    </x-slot>
</x-menu-grupos>
