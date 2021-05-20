<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger"> Alumno </a> >
            <a href="#" class="text-danger">Asistencias</a> >
        </div>
    <div align="center"><h4>Asistencias De {{$alumno->apellidos}}  {{$alumno->nombre}}</h4></div>
    <table class="table table-sm">
        <tr class="rounded text-white" style="background-color: #dc3545">
            <th> </th>
            <th>Dia</th>
            <th>Faltas</th>
            <th>Justificar</th>
        </tr>
        @foreach($asistencia as $item)
        <tr>

            <td></td>

            <td>

                @php
                    $fecha = date('d-m-Y', $item->fecha_creacion);

                    echo $fecha;

                @endphp

            </td>



                @if ($item->ausente==1)

                 <td> Presente </td>
                 <td></td>
                @else

               <td>Ausente</td>

               <td><a onclick="justificar(this)"><i class="fas fa-check"></i></a></td>

                @endif
        </tr>
        @endforeach
    </table>
    <div class="float-right mx-3">
        {{$asistencia->appends($request->except('page'))->links()}}
    </div>

    <script>

     function justificar(e){

            console.log(e);
     }

    </script>

</x-slot>

</x-menu-grupos>
