<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('prescripciones.index')}}" class="text-danger">Prescripciones</a> >
            <a href="{{route('prescripciones.index')}}" class="text-danger">Plazos</a> >
        </div>
        <div align="center">Prescripciones</div>
        <div class="row">
            <div class="col">
                <a href="{{route('plazosprescripciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Plazo Prescripción</a>
                <a href="{{route('prescripciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Prescripción</a>
                <a href="{{route('prescripciones.index')}}" class="btn btn-outline-danger my-2"><i class="fas fa-eye-circle"></i> Prescripciones</a>
            </div>
            <div class="col">
                <form action="{{route('plazosprescripciones.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <table class="table table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Cierre</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($plazosprescripciones as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                <td>
                    <a href="{{route('plazosprescripciones.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('plazosprescripciones.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$plazosprescripciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>