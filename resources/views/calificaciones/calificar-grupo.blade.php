<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('grupos.index')}}"> Grupos </a> >
            <a href="{{route('periodoscalificaciones.index')}}">Periodos Calificaciones</a> >
        </div>
        <div align="center">Calificar alumnos</div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col mb-5">
                {{-- <form action="{{route('calificaciones.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form> --}}
            </div>
        </div>
        <form action="{{route('calificaciones.calificar-grupo')}}" method="POST">
            @csrf
            <table class="table">
                <tr class="rounded text-white" style="background-color: #dc3545">
                    <th> </th>
                    <th>Nombre</th>
                    <th>Grupo</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach($alumnos as $item)
                <tr>
                    <td> </td>
                    <td>{{$item->alumno->nombre}} {{$item->alumno->apellidos}}</td>
                    <td>{{$item->grupo->nombre}}</td>
                    <td>
                        <input type="number" name="nota[]" value="@php

                            foreach ($calificaciones as  $nota) {
                                if($item->alumno->id==$nota->id_alumno){

                                        echo $nota->nota;
                                }
                            }

                        @endphp" min="0" max="100" step="1" placeholder="Sin Calificar">
                    </td>

                    <input type="hidden" name="id_alumno[]" value="{{$item->alumno->id}}">

                </tr>
                @endforeach
            </table>
            <input type="hidden" name="id_plazocalificacion" value="{{$request->id_plazocalificacion}}">
            <input type="hidden" name="id_grupo" value="{{$request->id_grupo}}">
            {{-- <input type="hidden" name="id_grupo" value="{{$id_actividad}}"> --}}
            <button type="submit" class="btn btn-danger ml-3">Calificar</button>
        </form>
        <div class="float-right mx-3">
            {{$alumnos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>

</x-menu-grupos>
