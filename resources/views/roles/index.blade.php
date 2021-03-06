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
                <a href="" id="pagFav" onclick="event.preventDefault(); localStorage.setItem('pagFav', window.location); pagFav();" class="btn btn-outline-danger"><i class="far fa-bookmark"></i></a>
                <a href="{{route('roles.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Añadir Rol</a>
                <a href="{{route('permisos.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Permiso</a>
            </div>
        </div>
        <table class="table table-striped table-hover table-sm">
            <tr class="rounded text-white" style="background-color: #dc3545">
                <th>Id</th>
                <th>Nombre</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($roles as $item)
            <tr onclick="window.location.href='{{route('rolespermisos.create', ['rol='.$item->id])}}'">
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td></td>
            </tr>
            @endforeach
        </table>
        <div class="float-right mx-3">
        </div>
    </x-slot>

</x-menu-grupos>