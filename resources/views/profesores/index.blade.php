<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        </div>
        <h5 class="text-center">Profesores</h5>
        <div class="row">
            <div class="col">
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger"  data-toggle="tooltip" data-placement="top" title="Guardar Pagina"><i class="far fa-bookmark"></i></a>
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
            <tr onclick="window.location.href='{{route('profesores.vista', ['id='.$item->id])}}'">
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->telefono}}</td>                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$profesores->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>