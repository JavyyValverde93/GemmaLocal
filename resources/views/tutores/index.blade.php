<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger"> Alumnos </a> > 
            <a href="" class="text-danger">Tutores</a> >
        </div>
        <div align="center">Tutores de {{$alumno}}</div>
        <div class="row">
            <div class="col">
                <a href="{{route('tutores.create', ["id_alumno=$id_alumno", "alumno=$alumno"])}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle mr-2"></i> Añadir Tutor</a>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th> </th>
                <th>Nombre del Tutor</th>
                <th>Teléfono</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Relación</th>
            </tr>
            @foreach($tutores as $item)
            <tr>
                <td></td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->relacion}}</td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$tutores->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>