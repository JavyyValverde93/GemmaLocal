<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('inventario.index')}}" class="text-danger">Inventario</a> >
        </div>
        <h5 align="center">Inventario</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('inventario.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Añadir a Inventario</a>
                <a href="{{route('prestamos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Solicitar Préstamo</a>
                <a href="{{route('prestamos.index')}}" class="btn btn-outline-danger my-2">Préstamos</a>
            </div>
            <div class="col">
                <form action="{{route('inventario.index')}}" class=" float-right m-3" method="GET">
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
                <th>Datos</th>
                <th>Fecha añadido</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($inventario as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td style="width: 400px">{{$item->datos}}</td>
                <td>{{date("d/m/Y", $item->fecha_modificacion)}}</td>
                <td>
                    <a href="{{route('inventario.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('inventario.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$inventario->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>