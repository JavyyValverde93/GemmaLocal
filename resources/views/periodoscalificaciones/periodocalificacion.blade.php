<x-menu-grupos>
    <x-slot name="slot">
        <div align="center">Periodos Calificaciones</div>
        <div class="row">
            <div class="col">
                <a href="{{route('periodoscalificaciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Plazo Calificación</a>
                <a href="{{route('calificaciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Calificar</a>
            </div>
            <div class="col">
                <form action="{{route('periodoscalificaciones.index')}}" class=" float-right m-3" method="GET">
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
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th> </th>
            </tr>
            @foreach($periodoscalificaciones as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><a href="{{route('calificaciones.create', ["id_grupo=$request->id_grupo", "id_plazocalificacion=$item->id"])}}">{{$item->nombre}}</a></td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                <td></td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$periodoscalificaciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>