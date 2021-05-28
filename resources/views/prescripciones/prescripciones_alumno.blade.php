<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
            <a href="{{route('prescripciones.index')}}" class="text-danger">Prescripciones</a> >
        </div>
        <h5 class="text-center">Prescripciones</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('plazosprescripciones.index')}}" class="btn btn-outline-danger my-2">Plazos</a>
                <a href="{{route('prescripciones.index', ['id_alumno='.$request->id_alumno, 'plazoprescripcion=true'])}}" class="btn btn-outline-danger my-2">Preinscribirse</a>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Alumno</th>
                <th>Actividad</th>
                <th>Plazo</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($prescripciones as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->alumno->apellidos}} {{$item->alumno->nombre}}</td>
                <td>{{$item->actividad->nombre}}</td>
                <td>{{$item->plazoprescripcion->nombre}}</td>
                <td>
                    {{-- <a href="{{route('prescripciones.show', $item)}}"><i class="fas fa-eye" title="Visualizar Prescripciones"></i></a>
                    <a href="{{route('prescripciones.edit', $item)}}"><i class="fas fa-edit" title="Editar Prescripciones"></i></a> --}}
                    {{-- <a href="{{route('matriculas.index', ['id_alumno='.$item->alumno->id, 'plazomatricula=true', "id_prescripcion=$item->id", "id_actividad=$item->id_actividad"])}}"><i class="fas fa-clipboard-list" title="Matriculas"></i></a> --}}
                </td>                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$prescripciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>