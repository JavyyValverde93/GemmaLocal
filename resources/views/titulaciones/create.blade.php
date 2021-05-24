<x-menu-grupos>
    <x-slot name="slot">
    <div class="row migaspan">
        <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        <a href="{{route('titulaciones.index')}}" class="text-danger">Titulaciones</a> >
    </div>
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
        <h5 class="text-center">Añadir Titulaci&oacute;n para {{$request->profesor}}</h5>
        <form action="{{route('titulaciones.store')}}" method="POST" class="mt-4 border p-5">
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
