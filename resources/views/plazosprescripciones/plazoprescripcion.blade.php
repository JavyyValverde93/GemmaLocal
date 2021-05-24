<x-menu-grupos>
    <x-slot name="slot">
        <script>
            navselected = 'prescripcion';
        </script>
        <div align="center">Seleccione el plazo en el que se desea preinscribir al alumno</div>
        <div class="row">
            <div class="col">
                {{-- <a href="{{route('matriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Matrícula</a> --}}
            </div>
        </div>
        <table class="table">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>&nbsp;</th>
                <th>Nombre</th>
                <th>Fecha inicial</th>
                <th>Fecha límite</th>
            </tr>
            @foreach($plazosprescripciones as $item)
            <tr>
                <td></td>
                <td><a href="{{route('prescripciones.create', ['id_alumno='.$request->id_alumno, 'id_plazoprescripcion='.$item->id])}}">{{$item->nombre}}</a></td>
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