<x-menu-grupos>
    <x-slot name="slot">
        <style>
            select{
              font-size: 20px;
              width: auto;
              padding-right: 26px;
            }
          </style>
        <div align="center">Préstamos</div>

        <form action="{{route('prestamos.store')}}" method="POST" class="ml-5 mt-4 border p-5">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Inventario</label><br>
                        <select name="id_inventario">
                            <option>Seleccione el inventario...</option>
                            @foreach($inventario as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
    
                    </div>
                    <div class="col">
                        <label>Fecha prevista devolución</label><br>
                        <input type="date" name="fecha_prevista_devolucion" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Fianza</label><br>
                        <input type="number" name="fianza" step="0.01" required>
                    </div>
                    <div class="col">
                        <label>Concepto</label><br>
                        <input name="concepto" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones" class="form-text">Observaciones</label>
                <textarea name="observaciones" cols="90" rows="4" required></textarea>
            </div>
            <input type="submit" name="Enviar" class="btn btn-danger">
        </form>

    </x-slot>
</x-menu-grupos>