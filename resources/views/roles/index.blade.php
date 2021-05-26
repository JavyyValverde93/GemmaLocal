<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('roles.index')}}" class="text-danger">Roles</a> >
        </div>        
        <script>
            navselected = 'rol';
        </script>
        <h5 class="text-center">Roles</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('roles.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Añadir Rol</a>
                <a href="{{route('permisos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Permiso</a>
                <a href="{{route('rolespermisos.create')}}" class="btn btn-outline-danger my-2">Asignar Rol a Permiso</a>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($roles as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{dd($item->permisos)}}</td>
                {{-- <td>
                    <a href="{{route('roles.show', $item)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('roles.edit', $item)}}"><i class="fas fa-edit"></i></a>
                </td>                --}}
                
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
        </div>
    </x-slot>

</x-menu-grupos>