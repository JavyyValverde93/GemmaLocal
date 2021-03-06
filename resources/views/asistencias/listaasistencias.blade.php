<x-menu-grupos>
    <x-slot name="slot">
        <script>
            navselected = 'alumno';
        </script>
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger"> Alumno </a> >
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
            <a href="#" class="text-danger">Asistencias</a> >
        </div>
    <div class="text-center"><h4>Asistencias De {{$alumno->apellidos}}  {{$alumno->nombre}}</h4></div>
    <table class="table table-sm">
        <tr class="rounded text-white" style="background-color: #dc3545">
            <th> </th>
            <th>Dia</th>
            <th>Grupo</th>
            <th>Faltas</th>
            <th>Justificar</th>
        </tr>
        @foreach($asistencia as $item)
        <tr>

            <td></td>

            <td>

                @php
                    $fecha = date('d-m-Y h:m:s A', $item->fecha_creacion);

                    echo $fecha;

                @endphp

            </td>

            <td>{{$item->grupo->nombre}}</td>


                @if ($item->ausente==1)

                 <td> Presente </td>
                 <td></td>
                @else
                @if ($item->justificada==1)

                <td>Justificada</td>
                <td></td>

               @else

               <td>Ausente</td>

               <td><a href="{{route('asistencia.justificar',$item)}}"><i class="fas fa-check"></i></a></td>

               @endif

                @endif
        </tr>
        @endforeach
    </table>
    <div class="float-right mx-3">
        {{$asistencia->appends($request->except('page'))->links()}}
    </div>



</x-slot>

</x-menu-grupos>