<x-menu-grupos>
    <x-slot name="slot">
        <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('alumnos.index')}}" class="text-danger">Alumnos</a> >
        </div>
        <h5 class="text-center">Alumnos</h5>
        <div class="row">
            <div class="col">
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Guardar Pagina"><i class="far fa-bookmark"></i></a>
                <a href="{{route('alumnos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear alumno</a>
            </div>
            <div class="col">
                <form action="{{route('alumnos.index')}}" class="float-right m-3" method="GET">
                @csrf
                <input type="hidden" name="ordenar" value="{{$request->ordenar}}">
                <input type="text" value="{{$request->nombre}}" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            <form action="{{route('alumnos.index')}}" method="GET" class="float-right m-3">
                @csrf 
                <i class="fas fa-sort mr-2"></i><select name="ordenar" onchange="this.form.submit()">
                    <option value="">Ordenar por...</option>
                    <option value="id" @if($request->ordenar=='id') selected @endif>Id</option>
                    <option value="nombre" @if($request->ordenar=='nombre') selected @endif>Nombre</option>
                    <option value="apellidos" @if($request->ordenar=='apellidos') selected @endif>Apellidos</option>
                    <option value="fecha_creacion" @if($request->ordenar=='fecha_creacion') selected @endif>Antigüedad</option>
                    <option value="edad" @if($request->ordenar=='edad') selected @endif>Edad</option>
                </select>
                <input type="hidden" name="nombre" value="{{$request->nombre}}">
            </form> 
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th> </th>
                <th>Id</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfonos</th>
            </tr>
            @foreach($alumnos as $item)
            <tr onclick="window.location.href='{{route('alumnos.vista', ['id='.$item->id])}}'">
                <td></td>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->apellidos}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->telefono}}<br>{{$item->telefono2}}</td>
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
            {{$alumnos->appends($request->except('page'))->links()}}
        </div>
    </x-slot>


</x-menu-grupos>
