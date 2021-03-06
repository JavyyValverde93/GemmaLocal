<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('logs.index')}}" class="text-danger">logs</a> >
        </div>
        <h4 class="text-center" class="mt-1">Crear Log</h4>
        <form action="{{route('logs.store')}}" method="POST" class="mt-4 border p-5" style="width: 1200px">
            @csrf
            <input type="hidden" name="id_usuario" value="{{$id_usuario}}">
                <div class="form-group col-md-4">
                    <label for="inputAccion">Acción</label> <br>
                    <textarea name="accion" rows="5" cols="80" required></textarea>
                    <small>{{$errors->first('accion')}}</small>
                </div>
            <button type="submit" class="btn btn-danger">Guardar</button>
        </form>
    </x-slot>
</x-menu-grupos>