<x-menu-grupos>
    <x-slot name="slot">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="ml-5 mt-1">Matricular</h1>
        <div class="col">
           
        </div>
        <div class="ml-5 mt-4 border p-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Matrícula</label>
                  <table class="table">
                    <tr class="rounded text-white" style="background-color: #dc3545">
                        <td style="padding-left:50px; padding-right:50px;">Nombre</td>
                        <td style="padding-left:50px; padding-right:50px;">Matricular</td>
                    </tr>
                      @foreach ($matricula as $item)
                      <tr>
                        <td>{{$item->nombre}}</td>
                        <td align="center">
                            <form action="{{route('matriculas.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_alumno" value="{{$request->id_alumno}}">
                                <input type="hidden" name="id_grupo" value="{{$item->id}}">
                                <button type="submit"><i class="fas fa-clipboard-list"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
    </x-slot>
</x-menu-grupos>