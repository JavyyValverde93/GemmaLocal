<x-menu-grupos>
    <x-slot name="slot">
        <h5 align="center">Reservas de Espacios</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('reservasespacios.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Reservar Espacio</a>
            </div>
            <div class="col">
                <form action="{{route('reservasespacios.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Usuario</th>
                <th>Espacio</th>
                <th>Grupo</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($reservasespacios as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td style="width: 400px">{{$item->descripcion}}</td>
                <td>{{$item->usuario->name}}</td>
                <td>{{$item->espacio->nombre}}</td>
                <td>{{$item->grupo->nombre}}</td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                <td>
                    <a href="{{route('reservasespacios.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('reservasespacios.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$reservasespacios->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>