<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('salarios.index')}}" class="text-danger">Salarios</a> >
        </div>
        <div align="center">Salario de {{$profesor->nombre}}</div>
        <div class="row">
            <div class="col">
            </div>
        </div>
        <table class="table table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th> </th>
                <th>Nombre</th>
                <th>Total/mes</th>
                <th>Nómina</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <form action="{{route('salarios.create')}}" method="POST">
                    @csrf
                    <td> </td>
                    <td>{{$profesor->nombre}} {{$profesor->apellidos}}</td>
                    <td>{{$salario->total_mes}} €</td>
                    <td>{{$salario->nomina}}</td>
                    <td>

                    </td>
                </form>
                
            </tr>
        </table>
        <div class="float-right mx-3">
        </div>
    </x-slot>

</x-menu-grupos>