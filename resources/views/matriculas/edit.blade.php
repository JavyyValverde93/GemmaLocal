<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
            <a href="{{route('alumnos.vista', ["id=$matricula->id_alumno"])}}" class="text-danger">Alumno</a> >
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="ml-5 mt-1">Matricula de {{$matricula->alumno->nombre}} {{$matricula->Alumno->apellidos}}</h1>
        <div class="col">
           
        </div>
        <div class="ml-5 mt-4 border p-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Matrícula</label>
                  <form action="{{route('matriculas.update', $matricula)}}" method="POST">
                    @csrf 
                    @method('PUT')
                    <table class="table">
                        <tr class="rounded text-white" style="background-color: #dc3545">
                            <td style="padding-left:50px; padding-right:50px;">Alumno</td>
                            <td style="padding-left:50px; padding-right:50px;">Grupo</td>
                            <td style="padding-left:50px; padding-right:50px;">Plazo Matrícula</td>
                            <td style="padding-left:50px; padding-right:50px;">Id Prescripción</td>
                        
                        </tr>
                        <tr>
                            <td>{{$matricula->alumno->nombre}} {{$matricula->alumno->apellidos}}</td>
                            <td>
                                <select name="id_grupo" required>
                                    @foreach ($grupos as $item)
                                        <option value="{{$item->id}}" @if($item->id==$matricula->id_grupo) selected @endif>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                {{$matricula->plazomatricula->nombre}}
                            </td>
                            <td class="text-center">{{$matricula->id_prescripcion}}</td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-danger px-5">Modificar</button>
                  </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-menu-grupos>