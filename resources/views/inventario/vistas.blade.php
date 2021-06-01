<x-menu-grupos>
    <x-slot name="slot">
        <div class="ro{{$errors->first('slot')}}</small>w migaspan">
            <a href="{{route('inventario.index')}}" class="text-danger">Inventario</a> >
        </div>
        <small>{{$errors->first('slot')}}</small>
        <style>
            b:not(.no)::after {
                content: " *";
                color: red;
            }
            
            select{
                font-size: 20px;
                width: auto;
                padding-right: 26px;
            }

            .list-group-item.active{
                background-color: #dc3545;
                border-color: rgb(202, 17, 17);
            }

        </style>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <form @if($inventario->nombre!=null) action="{{route('inventario.update', $inventario)}}" @else
            action="{{route('inventario.store')}}" @endif enctype="multipart/form-data" method="POST"
            onsubmit="disableButton(this)">
            @csrf
            @if($inventario->nombre!=null)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 col-xs-9">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action show active" id="list-inventario-list" data-toggle="list"
                                href="#list-home" role="tab" aria-controls="inventario">Inventario</a>

                            <a class="list-group-item list-group-item-action" 
                            href="{{route('prestamos.index')}}">Prestamos</a>
                        </div>
                    </div>
                    <div class="col-sm-9 mt-2 col-xs-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Inventario</h5>
                                        <table class="table table-sm">
                                            <tr>
                                                <td colspan="2">
                                                    <b>Id:</b>
                                                    <input type="text" class="form-control" id="id" name="id"
                                                        placeholder="id" value="{{$inventario->id}}">
                                                    <small>{{$errors->first('id')}}</small>
                                                </td>
                                                <td colspan="2">
                                                    <b>Nombre:</b>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="nombre" value="{{$inventario->nombre}}">
                                                    <small>{{$errors->first('nombre')}}</small>
                                                </td>                                                
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Datos:</b>
                                                    <input type="text" class="form-control" id="datos"
                                                        name="datos" placeholder="datos"
                                                        value="{{$inventario->datos}}">
                                                    <small>{{$errors->first('datos')}}</small></h5>
                                                </td>
                                            </tr>
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-inventario" role="tabpanel"
                                aria-labelledby="list-inventario-list">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Préstamos</h5>
                                        <table class="table">                                            
                                        </table>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger mt-1" style="margin-left: 50%;">Guardar
                cambios</button>
        </form>
    </x-slot>
</x-menu-grupos>