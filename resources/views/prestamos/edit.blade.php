<x-menu-grupos>
    <x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('inventario.index')}}" class="text-danger">Inventario</a> >
            <a href="{{route('prestamos.index')}}" class="text-danger">Prestamos</a> >
            <a href="{{route('prestamos.create')}}" class="text-danger">Solicitar Prestamo</a> >
        </div>
        <style>
            select{
              font-size: 20px;
              width: auto;
              padding-right: 26px;
            }
          </style>
        <div align="center">Préstamos</div>

        <form action="{{route('prestamos.edit', $prestamo)}}" method="POST" class="mt-4 border p-5">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_usuario" value="1">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Inventario</label><br>
                        <select name="id_inventario" value="{{$prestamo->id_inventario}}">
                            <option>Seleccione el inventario...</option>
                            @foreach($inventario as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
    
                    </div>
                    <div class="col">
                        <label>Fecha prevista devolución</label><br>
                        <input type="date" name="fecha_prevista_devolucion" required  value="{{$prestamo->fecha_prevista_devolucion}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Fianza</label><br>
                        <input type="number" name="importe_fianza" step="0.01" required value="{{$prestamo->importe_fianza}}">
                    </div>
                    <div class="col">
                        <label>Concepto</label><br>
                        <input name="concepto_fianza" required value="{{$prestamo->concepto_fianza}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones" class="form-text">Observaciones</label>
                <textarea name="observaciones" cols="90" rows="4" required value="{{$prestamo->observaciones}}"></textarea>
            </div>
            <input type="submit" name="Enviar" class="btn btn-danger">
        </form>

    </x-slot>
</x-menu-grupos>