<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
        </div>
        <script>
            navselected = 'prescripcion';
        </script>
        <h5 class="text-center" class="mt-1">Seleccione el plazo en el que se desea preinscribir al alumno</h5>        <div class="row">
            <div class="col">
                {{-- <a href="{{route('matriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Matrícula</a> --}}
            </div>
        </div>
        <table class="table table-striped table-hover table-sm mt-1">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>&nbsp;</th>
                <th>Nombre</th>
                <th>Fecha inicial</th>
                <th>Fecha límite</th>
            </tr>
            @foreach($plazosprescripciones as $item)
            <tr onclick="window.location.href='{{route('prescripciones.create', ['id_alumno='.$request->id_alumno, 'id_plazoprescripcion='.$item->id])}}'">
                <td></td>
                <td>{{$item->nombre}}</td>
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$plazosprescripciones->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>