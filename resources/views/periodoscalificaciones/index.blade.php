<x-menu-grupos>
    <x-slot name="slot">
    <div class="row migaspan">
      <a href="{{route('periodoscalificaciones.index')}}" class="text-danger">Periodo Calificaciones</a> >
    </div>
        <h5 class="text-center">Periodos Calificaciones</h5>
        <div class="row">
            <div class="col">
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger"><i class="far fa-bookmark"></i></a>
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
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($periodoscalificaciones as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                <td>
                    {{-- <a href="{{route('periodoscalificaciones.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('periodoscalificaciones.edit', $item)}}"><i class="fas fa-edit"></i></a> --}}
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$periodoscalificaciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>