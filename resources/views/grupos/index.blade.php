<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger"> Grupos </a> > 
        </div>
        <div align="center">Grupos</div>
        <div class="row">
            <div class="col">
                <a href="{{route('grupos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Grupo</a>
                <a href="{{route('actividades.index')}}" class="btn btn-outline-danger my-2">Ver Actividades</a>
            </div>
            <div class="col">
                <form action="{{route('grupos.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" name="nombre" class="rounded" value="{{$request->nombre}}" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Espacio</th>
                <th>Planta</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($grupos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td><a href="{{route('profesores.show', $item->profesor)}}" class="text-black">{{$item->profesor->apellidos}} {{$item->profesor->nombre}}</a></td>
                <td><a href="{{route('espacios.show', $item->espacio)}}" class="text-black">{{$item->espacio->nombre}}</a></td>
                <td><a href="#" class="text-black">{{$item->espacio->planta}}</a></td>
                <td>
                    <a href="{{route('grupos.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('grupos.edit', $item)}}"><i class="fas fa-edit mx-2"></i></a>
                    <a href="{{route('periodoscalificaciones.index', ["c=p", "id_grupo=$item->id"])}}"><i class="fas fa-sort-numeric-up-alt"></i></a>
                    <a href="{{route('asistencias.index', ["id_grupo=$item->id"])}}"><i class="fas fa-list mx-2"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$grupos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>