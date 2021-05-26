<x-menu-grupos>
    <x-slot name="slot">
        <h1 class="ml-5 mt-1">Permiso</h1>
        <form action="{{route('permisos.store')}}" class="ml-5 mt-4 border p-5" method="POST">
            @csrf 
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                  </div>
            </div>
            <button type="submit" class="btn btn-danger">Guardar</button>
        </form>
    </x-slot>
</x-menu-grupos>