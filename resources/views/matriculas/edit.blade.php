<x-menu-grupos>
    <x-slot name="slot">
        <h1 class="ml-5 mt-1">Matricular</h1>
        <div class="col">
            <form action="{{route('grupos.edit', 'grupo')}}" class=" float-right m-3" method="GET">
            @csrf
            @method('PUT')
            <input type="hidden" name="redirect" value="{{$grupo->redirect}}">
            <input type="text"  value="{{$grupo->nombre}}" name="nombre" class="rounded" >
            <input type="hidden" name="id_alumno"  value="{{$grupo->id_alumno}}">
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
                        <td align="center">
                            <form action="{{route('matriculas.edit', 'matricula')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_alumno"  value="{{$matricula->id_alumno}}">
                                <input type="hidden" name="id_grupo"  value="{{$matricula->id_grupo}}">
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