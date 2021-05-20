<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('grupos.index')}}" class="text-danger"> Grupos </a> > 
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
            <a href="" class="text-danger">Titulaciones</a> >
        </div>
        <h5 align="center">Titulaciones de {{$profesor}}</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('titulaciones.create', ["id_profesor=$id_profesor", "profesor=$profesor"])}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle mr-2"></i> Añadir Titulación</a>
            </div>
        </div>
        <table class="table">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th> </th>
                <th>Nombre</th>
                <th>Titulación</th>
                <th>Actividad</th>
                <th>Especialidad</th>
            </tr>
            @foreach($titulaciones as $item)
            <tr>
                <td></td>
                <td>{{$item->profesor->nombre}} {{$item->profesor->apellidos}}</td>
                <td>{{$item->titulacion}}</td>
                <td>{{$item->actividad->nombre}}</td>
                <td>{{$item->especialidad}}</td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$titulaciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>