<x-menu-grupos>
    <x-slot name="slot">
        <script>
            navselected = 'prefesor';
        </script>
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger"> Alumnos </a> > 
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
            <a href="" class="text-danger">Actividades</a> >
        </div>
        <h5 class="text-center">Actividades</h5>
        <div class="row">
            <div class="col">
                <form action="{{route('actividades.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Grupo</th>
                <th>Espacio</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($actividades as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} </td>
                <td><a href="{{route('profesores.show', $item->profesor)}}" class="text-black">{{$item->profesor->apellidos}} {{$item->profesor->nombre}}</a></td>
                <td><a href="{{route('grupos.show', $item->grupo)}}" class="text-black">{{$item->grupo->nombre}}</a></td>
                <td><a href="{{route('espacios.show', $item->grupo->espacio)}}" class="text-black">{{$item->grupo->espacio->nombre}}</a></td>
                <td>
                    {{-- <a href="{{route('grupos.show', $item)}}"><i class="fas fa-eye" title="Visualizar Actividad"></i></a>
                    <a href="{{route('grupos.edit', $item)}}"><i class="fas fa-edit mx-2" title="Editar Actividad"></i></a>
                    <a href="{{route('periodoscalificaciones.index', ["c=p", "id_grupo=$item->id"])}}"><i class="fas fa-sort-numeric-up-alt" title="Periodo Calificaciones"></i></a> --}}
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$actividades->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>