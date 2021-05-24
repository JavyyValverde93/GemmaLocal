<x-menu-grupos>
    <x-slot name="slot">
        <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
        </div>
        <h5 align="center">Alumnos</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('alumnos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear alumno</a>
            </div>
            <div class="col">
                <form action="{{route('alumnos.index')}}" class=" float-right m-3" method="GET">
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
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfonos</th>
                <td></td>
            </tr>
            @foreach($alumnos as $item)
            <tr>
                <td></td>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->telefono}}<br>{{$item->telefono2}}</td>
                <td class="m-2">
                    <a href="{{route('alumnos.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('alumnos.edit', $item)}}"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{route('matriculas.index', ['id_alumno='.$item->id, 'plazomatricula=true'])}}"><i class="fas fa-clipboard-list"></i></a>
                    <a href="{{route('prescripciones.index', ['id_alumno='.$item->id, 'plazoprescripcion=true'])}}"><i class="fas fa-file-prescription"></i></a>
                    <a href="{{route('tutores.index', ["id_alumno=$item->id", "alumno=$item->nombre $item->apellidos"])}}"><i class="fas fa-address-book"></i></a>

                    <a href="{{route('asistencia.verlista',$item)}}"><i class="fas fa-list"></i></a>
                </td>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->telefono}}<br>{{$item->telefono2}}</td>

            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$alumnos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>
