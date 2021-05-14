<x-menu-grupos>
    <x-slot name="slot">
        <div align="center">Prescripciones</div>
        <div class="row">
            <div class="col">
                <a href="{{route('plazosprescripciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Plazo Prescripción</a>
                <a href="{{route('prescripciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Prescripción</a>
                <a href="{{route('plazosprescripciones.index')}}" class="btn btn-outline-danger my-2"><i class="fas fa-eye-circle"></i> Plazos</a>
            </div>
            <div class="col">
                <form action="{{route('matriculas.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Alumno</th>
                <th>Grupo</th>
                <th>Prescripción</th>
                <th>Plazo</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($prescripciones as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->grupo->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->id}}</td>
                <td>
                    <a href="{{route('matriculas.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('matriculas.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$prescripciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>