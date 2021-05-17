<x-menu-grupos>
    <x-slot name="slot">
        <div align="center">Plazos Matrículas</div>
        <div class="row">
            <div class="col">
                {{-- <a href="{{route('matriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Matrícula</a> --}}
            </div>
            <div class="col">
                <form action="{{route('plazosmatriculas.plazomatricula')}}" class="float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>&nbsp;</th>
                <th>Nombre</th>
                <th>Fecha inicial</th>
                <th>Fecha límite</th>
            </tr>
            @foreach($plazosmatriculas as $item)
            <tr>
                <td></td>
                <td><a href="{{route('matriculas.create', ['id_alumno='.$request->id_alumno, 'id_plazomatricula='.$item->id])}}">{{$item->nombre}}</a></td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$plazosmatriculas->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>