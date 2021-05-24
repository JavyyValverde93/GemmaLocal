<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        </div>
        <h5 class="text-center">Profesores</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('profesores.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Profesor</a>
            </div>
            <div class="col">
                <form action="{{route('profesores.index')}}" class=" float-right m-3" method="GET">
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
                <th>DNI</th>
                <th>Teléfono</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($profesores as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->telefono}}</td>
                <td>
                    <a href="{{route('profesores.show', $item)}}"><i class="fas fa-eye" title="Visualizar Profesores"></i></a>
                    <a href="{{route('profesores.edit', $item)}}"><i class="fas fa-edit" title="Editar Profesores"></i></a>
                    <a href="{{route('titulaciones.index', ["id_profesor=$item->id", "profesor=$item->nombre $item->apellidos"])}}"><i class="fas fa-suitcase" title="Titulaciones"></i></a>
                    <a href="{{route('salarios.index', ["id_profesor=$item->id"])}}"><i class="fas fa-euro-sign" title="Salarios"></i></a>
                    <a href="{{route('facturaciones.index', ["id_profesor=$item->id"])}}"><i class="fas fa-file-invoice" title="Facturaciones"></i></a>

                </td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$profesores->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>