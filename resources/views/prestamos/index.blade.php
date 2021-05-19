<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('inventario.index')}}" class="text-danger">Inventario</a> >
            <a href="{{route('prestamos.index')}}" class="text-danger">Prestamos</a> >
        </div>
        <div align="center">Préstamos</div>
        <div class="row">
            <div class="col">
                <a href="{{route('inventario.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Añadir a Inventario</a>
                <a href="{{route('prestamos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Solicitar Préstamo</a>
            </div>
            <div class="col">
                <form action="{{route('prestamos.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Observaciones</th>
                <th>Fecha añadido</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($prestamos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->inventario->nombre}}</td>
                <td>{{$item->user->name}}</td>
                <td style="width: 400px">{{$item->observaciones}}</td>
                <td>{{date("d/m/Y", $item->fecha_modificacion)}}</td>
               
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$prestamos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>