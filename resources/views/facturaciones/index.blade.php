<x-menu-grupos>
    <x-slot name="slot">
        <h5 align="center">Facturaciones</h5>
        <div class="row">
            <div class="col">
                <a href="{{route('facturaciones.create')}}" class="btn btn-outline-danger my-2"><i class="fas fa-plus-circle"></i> Crear Factura</a>
            </div>
            <div class="col">
                <form action="{{route('facturaciones.index')}}" class=" float-right m-3" method="GET">
                @csrf
                <input type="text" name="nombre" class="rounded" placeholder="Buscar...">
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
    </x-slot>
</x-menu-grupos>