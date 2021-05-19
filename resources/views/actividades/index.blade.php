<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger"> Grupos </a> > 
            <a href="{{route('actividades.index')}}" class="text-danger"> Actividades </a> > 
        </div>
        <div align="center">Actividades</div>
        <div class="row">
            <div class="col">
                <a href="{{route('grupos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Grupo</a>
            </div>
            <div class="col">
                <form action="{{route('actividades.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Espacio</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($actividades as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} </td>
                <td><a href="{{route('profesores.show', $item->profesor)}}" class="text-black">{{$item->profesor->apellidos}} {{$item->profesor->nombre}}</a></td>
                <td><a href="{{route('grupos.show', $item->grupo)}}" class="text-black">{{$item->grupo->nombre}}</a></td>
                <td>
                    {{-- <a href="{{route('grupos.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('grupos.edit', $item)}}"><i class="fas fa-edit mx-2"></i></a>
                    <a href="{{route('periodoscalificaciones.index', ["c=p", "id_grupo=$item->id"])}}"><i class="fas fa-sort-numeric-up-alt"></i></a> --}}
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$actividades->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>