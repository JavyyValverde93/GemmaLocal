<x-menu-grupos>
        <x-slot name="slot">
            <div class="row migaspan">
                <a href="{{route('grupos.index')}}" class="text-danger"> Grupos </a> > 
                <a href="#" class="text-danger">Asistencias</a> >
            </div>
        <div align="center">Asistencias</div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                
            </div>
        </div>
        <form action="{{route('asistencias.store')}}" method="POST">
            @csrf
            <table class="table">
                <tr class="rounded text-white" style="background-color: #dc3545">
                    <th> </th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Asistencia</th>
                </tr>
                @foreach($alumnos as $item)
                <tr>
                    <td> </td>
                    <td>{{$item->alumno->nombre}} {{$item->alumno->apellidos}}</td>
                    <td>{{$item->alumno->telefono}}</td>
                    <td>
                        <input type="radio" name="as{{$item->alumno->id}}" value="1" class="mx-1"/> Sí
                        <input type="radio" name="as{{$item->alumno->id}}" value="-1"class="mx-1" checked/> No

                    </td>
                    
                </tr>
                @endforeach
            </table>
            <button type="submit" class="btn btn-danger mt-3">Enviar</button>
        </form>
        <div class="float-right mx-3">
            {{-- {{$alumnos->appends($request->except('page'))->links()}} --}}
        </div>
    </x-slot>

</x-menu-grupos>