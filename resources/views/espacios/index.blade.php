<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('espacios.index')}}" class="text-danger">Espacios</a> >
        </div>
        <div align="center">Espacios</div>
        <div class="row">
            <div class="col">
                <a href="{{route('espacios.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Espacio</a>
                <a href="{{route('reservasespacios.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Reservar Espacio</a>
            </div>
            <div class="col">
                <form action="{{route('espacios.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Planta</th>
                <th>Turno</th>
                <th>Aula Combinada</th>
                <th>Activo</th>

                <th>&nbsp;</th>
            </tr>
            @foreach($espacios as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->capacidad}}</td>
                <td>{{$item->planta}}</td>
                <td>@if($item->turno==false)No @else Sí @endif</td>
                <td>@if($item->aula_combinada==false)No @else Sí @endif</td>
                <td>@if($item->activo==false)No @else Sí @endif</td>
                <td>
                    <a href="{{route('espacios.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('espacios.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$espacios->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>