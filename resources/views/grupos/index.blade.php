<x-menu-grupos>
    <x-slot name="slot">
        <div align="center">Grupos</div>
        <div class="row">
            <div class="col">
                <a href="{{route('grupos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Grupo</a>
            </div>
            <div class="col">
                <form action="{{route('grupos.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($grupos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->profesor->nombre}}</td>
                <td>
                    <a href="{{route('grupos.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('grupos.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$grupos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>