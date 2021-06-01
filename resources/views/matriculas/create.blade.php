<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.vista', ["id=$request->id_alumno"])}}" class="text-danger">Alumno</a> >
            <a href={{route('matriculas.index', ['id_alumno='.$request->id_alumno, 'plazomatricula=true'])}} class="text-danger">Plazomatrícula</a> >
        </div>
        <h4 class="ml-5 mt-1">Seleccione el grupo en el que se desea matricular</h4>
        <div class="col">
            <form action="{{route('grupos.index')}}" class=" float-right m-3" method="GET">
            @csrf
            <input type="hidden" name="redirect" value="matriculas">
            <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar grupos...">
            <input type="hidden" name="id_alumno" value="{{$request->id_alumno}}">
            <input type="hidden" name="id_plazomatricula" value="{{$request->id_plazomatricula}}">
            <input type="hidden" name="id_prescripcion" value="{{$request->id_prescripcion}}">
                                
            <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
        </form>
        </div>
        <div class="ml-5 mt-4 border p-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Grupos</label>
                  <table class="table">
                    <tr class="rounded text-white" style="background-color: #dc3545">
                        <td style="padding-left:50px; padding-right:50px;">Nombre</td>
                        <td style="padding-left:50px; padding-right:50px;">Matricular</td>
                    </tr>
                      @foreach ($grupos as $item)
                      <tr>
                        <td>{{$item->nombre}}</td>
                        <td class="text-center">
                            <form action="{{route('matriculas.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_alumno" value="{{$request->id_alumno}}">
                                <input type="hidden" name="id_plazomatricula" value="{{$request->id_plazomatricula}}">
                                <input type="hidden" name="id_grupo" value="{{$item->id}}">
                                <input type="hidden" name="id_prescripcion" value="{{$request->id_prescripcion}}">
                                <button type="submit"><i class="fas fa-clipboard-list"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                  </table>
                  {{$grupos->appends($request->except('page'))->links()}}
                </div>
            </div>
        </div>
    </x-slot>
</x-menu-grupos>