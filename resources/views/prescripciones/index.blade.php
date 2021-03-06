<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('prescripciones.index')}}" class="text-danger">Prescripciones</a> >
        </div>
        <h5 class="text-center">Prescripciones</h5>
        <div class="row">
            <div class="col">
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger"><i class="far fa-bookmark"></i></a>
                <a href="{{route('prescripciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Prescripción</a>
                <a href="{{route('plazosprescripciones.index')}}" class="btn btn-outline-danger my-2"><i class="fas fa-eye-circle"></i> Plazos</a>
            </div>
            <div class="col">
                <a href="{{route('prescripciones.index', ['pendientes=true', 'nombre='.$request->nombre])}}" class="btn btn-outline-danger my-2"><i class="fas fa-clock"></i> Pendientes</a>
                <a href="{{route('prescripciones.index', ['matriculadas=true', 'nombre='.$request->nombre])}}" class="btn btn-outline-danger my-2"><i class="fas fa-check-circle"></i> Matriculadas</a>
           </div>
            <div class="col">
                <form action="{{route('prescripciones.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
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
                    <a href="{{route('matriculas.index', ['id_alumno='.$item->alumno->id, 'plazomatricula=true', "id_prescripcion=$item->id", "id_actividad=$item->id_actividad"])}}"><i class="fas fa-clipboard-list" title="Matriculas"></i></a>
                </td>                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$prescripciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>