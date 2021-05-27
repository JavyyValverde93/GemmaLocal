<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('matriculas.index')}}" class="text-danger">Matrículas</a> >
            <a href="{{route('plazosmatriculas.index')}}" class="text-danger">Plazos Matrículas</a> >
        </div>
        <h5 class="text-center">Plazos Matrículas</h5>
        <div class="row">
            <script>
                navselected = 'matricula';
            </script>
            <div class="col">
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger"><i class="far fa-bookmark"></i></a>
                <a href="{{route('plazosmatriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Plazo Matriculación</a>
                {{-- <a href="{{route('matriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Matrícula</a> --}}
            </div>
            <div class="col">
                <form action="{{route('plazosmatriculas.index')}}" class=" float-right m-3" method="GET">
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
                <th>Fecha inicial</th>
                <th>Fecha límite</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($plazosmatriculas as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                <td>
                    {{-- <a href="{{route('plazosmatriculas.show', $item)}}"><i class="fas fa-eye" title="Visualizar Plazos Matriculas"></i></a> --}}
                    <a href="{{route('plazosmatriculas.edit', $item)}}"><i class="fas fa-edit" title="Editar Plazos Matrículas"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$plazosmatriculas->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>