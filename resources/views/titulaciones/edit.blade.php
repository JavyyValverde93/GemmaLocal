<x-menu-grupos>
    <x-slot name="slot">
        
        <script>
            navselected = 'profesor';
        </script>
        
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
            
            select {
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

        </style>
        <h5 class="text-center">Editar Titulaci&oacute;n para {{$request->profesor}}</h5>
        <form action="{{route('titulaciones.edit', $titulacion)}}" method="POST" class="ml-5 mt-4 border p-5">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_profesor" value="{{$id_profesor}}">
            <input type="hidden" name="profesor" value="{{$request->profesor}}">
            <div class="form-group">
                <label for="titulacion" class="form-text">Titulaci&oacute;n</label>
                <input type="text" name="titulacion" class="form-control" value="{{$titulacion->titulacion}}">
                <small>{{$errors->first('titulacion')}}</small>
            </div>
            <div class="form-group">
                <label for="especialidad" class="form-text">Especialidad</label>
                <input type="text" name="especialidad" class="form-control" value="{{$titulacion->especialidad}}">
                <small>{{$errors->first('especialidad')}}</small>
            </div>
            
            <div class="form-group">
                <label class="form-text">Actividad</label>
                <select name="id_actividad" value="{{$titulacion->id_actividad}}">
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
