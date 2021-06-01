<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
        </div>
        <div class="row">
            <div class="col">
                {{-- <a href="{{route('matriculas.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Matrícula</a> --}}
            </div>
            <script>
                navselected = 'matricula';
            </script>
            <div class="col">
                <form action="{{route('plazosmatriculas.plazomatricula')}}" class="float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        <h5 class="text-center">Seleccione el plazo en el que se desea matricular al alumno</h5>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>&nbsp;</th>
                <th>Nombre</th>
                <th>Fecha inicial</th>
                <th>Fecha límite</th>
            </tr>
            @foreach($plazosmatriculas as $item)
            @if($request->id_actividad==null)
            <tr onclick="window.location.href='{{route('matriculas.create', ['id_alumno='.$request->id_alumno, 'id_plazomatricula='.$item->id])}}'">
                <td></td>
                <td>{{$item->nombre}}</td>
                @else
                <td></td>
                    <td>
                        <form action="{{route('matriculas.store')}}" method="POST">
                            @csrf 
                            <input type="hidden" name="id_alumno" value="{{$request->id_alumno}}">
                            <input type="hidden" name="id_plazomatricula" value="{{$item->id}}">
                            <input type="hidden" name="id_actividad" value="{{$request->id_actividad}}">
                            <input type="hidden" name="id_prescripcion" value="{{$request->id_prescripcion}}">
                            <button type="submit">{{$item->nombre}}</button>
                        </form>
                    </td>
                @endif
                <td>{{date("d/m/Y", $item->fecha_inicio)}}</td>
                <td>{{date("d/m/Y", $item->fecha_fin)}}</td>
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$plazosmatriculas->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>