<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger"> Grupos </a> > 
        </div>
        <h5 class="text-center">Grupos</h5>
        <div class="row">
            <div class="col">
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Guardar Pagina"><i class="far fa-bookmark"></i></a>
                <a href="{{route('grupos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Grupo</a>
                <a href="{{route('actividades.index')}}" class="btn btn-outline-danger my-2">Ver Actividades</a>
            </div>
            <div class="col">
                <form action="{{route('grupos.index')}}" class="float-right m-3" method="GET">
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
            <tr onclick="window.location.href='{{route('grupos.vista', ['id='.$item->id])}}'">
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td><a href="{{route('profesores.show', $item->profesor)}}" class="text-black">{{$item->profesor->apellidos}} {{$item->profesor->nombre}}</a></td>
                <td><a href="{{route('espacios.show', $item->espacio)}}" class="text-black">{{$item->espacio->nombre}}</a></td>
                <td><a href="#" class="text-black">{{$item->espacio->planta}}</a></td>                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$grupos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>