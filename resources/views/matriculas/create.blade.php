<x-menu-grupos>
    <x-slot name="slot">
        <h1 class="ml-5 mt-1">Matricula</h1>
        <form class="ml-5 mt-4 border p-5" style="width: 1200px">
            <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Id Grupo</label>
                  <input type="number" class="form-control" name="id_grupo" required>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Matricularse</button>
        </form>
    </x-slot>
</x-menu-grupos>