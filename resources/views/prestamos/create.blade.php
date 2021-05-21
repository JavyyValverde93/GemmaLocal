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

        <form action="{{route('prestamos.store')}}" method="POST" class="mt-4 border p-5">
            @csrf
            <input type="hidden" name="id_usuario" value="1">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Inventario</label><br>
                        <select name="id_inventario" required>
                            <option>Seleccione el inventario...</option>
                            @foreach($inventario as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                        <small>{{$errors->first('id_inventario')}}</small>
    
                    </div>
                    <div class="col">
                        <label>Fecha prevista devolución</label><br>
                        <input type="date" name="fecha_prevista_devolucion" required>
                        <small>{{$errors->first('fecha_prevista_devolucion')}}</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Fianza</label><br>
                        <input type="number" name="importe_fianza" step="0.01" required>
                        <small>{{$errors->first('importe_fianza')}}</small>
                    </div>
                    <div class="col">
                        <label>Concepto</label><br>
                        <input name="concepto_fianza" required>
                        <small>{{$errors->first('concepto_fianza')}}</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones" class="form-text">Observaciones</label>
                <textarea name="observaciones" cols="90" rows="4" required></textarea>
                <small>{{$errors->first('observaciones')}}</small>
            </div>
            <input type="submit" name="Enviar" class="btn btn-danger">
        </form>

    </x-slot>
</x-menu-grupos>