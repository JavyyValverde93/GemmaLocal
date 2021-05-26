<x-menu-grupos>
    <x-slot name="slot">
        <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('logs.index')}}" class="text-danger">logs</a> >
        </div>
        <h5 class="text-center">Logs</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('logs.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Log</a>
            </div>
            <div class="col">
                <form action="{{route('logs.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th> </th>
                <th>Id</th>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Fecha</th>
                <td></td>
            </tr>
            @foreach($logs as $item)
            <tr>
                <td></td>
                <td>{{$item->id}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->accion}}</td>
                <td>{{date("d/m/Y h:i:s A", $item->fecha_creacion)}}</td>
                <td></td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$logs->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>