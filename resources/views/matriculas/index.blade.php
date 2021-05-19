<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('matriculas.index')}}" class="text-danger">Matriculas</a> >
        </div>
        <div align="center">Matrículas</div>
        <div class="row">
            <div class="col">
                <a href="{{route('plazosmatriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Plazo Matriculación</a>
                <a href="{{route('plazosmatriculas.index')}}" class="btn btn-outline-danger my-2"> Plazos Matriculación</a>
                {{-- <a href="{{route('matriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Matrícula</a> --}}
            </div>
            <div class="col">
                <form action="{{route('matriculas.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th> </th>
                <th>Alumno</th>
                <th>Grupo</th>
                <th>Id Prescripción</th>
                <th>Plazo</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($matriculas as $item)
            <tr>
                <td></td>
                <td>{{$item->alumno->nombre}} {{$item->alumno->apellidos}}</td>
                <td>{{$item->grupo->nombre}}</td>
                <td>{{$item->id_prescripcion}}</td>
                <td>{{date("d/m/Y", $item->plazomatricula->fecha_inicio)}} - {{date("d/m/Y", $item->plazomatricula->fecha_fin)}}</td>
                <td>
                    <a href="{{route('matriculas.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('matriculas.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$matriculas->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>