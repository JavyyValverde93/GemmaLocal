<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
            <a href="{{route('prescripciones.index', ['id_alumno='.$request->id_alumno, 'plazoprescripcion=true'])}}" class="text-danger">Plazosprescripción</a> >
        </div>
        <h5 class="text-center" class="mt-2">Seleccione la Actividad en la que se desea preinscribir</h5>
        <div class="col">
            <form action="{{route('prescripciones.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="hidden" name="redirect" value="matriculas">
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar grupos...">
                <input type="hidden" name="id_alumno" value="{{$request->id_alumno}}">
                <input type="hidden" name="id_plazomatricula" value="{{$request->id_plazomatricula}}">                                    
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="mt-4 border p-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Actividades</label>
                  <table class="table">
                    <tr class="rounded text-white" style="background-color: #dc3545">
                        <td style="padding-left:50px; padding-right:50px;">Nombre</td>
                        <td style="padding-left:50px; padding-right:50px;">Preinscribirse</td>
                    </tr>
                      @foreach ($actividades as $item)
                      <tr>
                        <td>{{$item->nombre}}</td>
                        <td align="center">
                            <form action="{{route('prescripciones.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_alumno" value="{{$request->id_alumno}}">
                                <input type="hidden" name="id_actividad" value="{{$item->id}}">
                                <input type="hidden" name="id_plazoprescripcion" value="{{$request->id_plazoprescripcion}}">
                                <button type="submit"><i class="fas fa-clipboard-list"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                  </table>
                  {{$actividades->appends($request->except('page'))->links()}}
                </div>
            </div>
        </div>
    </x-slot>
</x-menu-grupos>