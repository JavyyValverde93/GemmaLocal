<x-menu-grupos>
    <x-slot name="slot">
		<div class="row migaspan">
            <a href="{{route('roles.index')}}" class="text-danger">Roles</a> >
        </div>        
        <h1 class="text-center">Permisos</h1>
        @php $cambio = 1; @endphp
        
        <form action="{{route('rolespermisos.store')}}" method="POST" class="ml-5 mt-4 border p-5" name="f1">
            @csrf
            <input type="hidden" name="rol" value="{{$request->rol}}">
            <table class="table table-striped table-hover table-sm">
                <tr class="rounded text-white" style="background-color: #dc3545">
                    <th><input type="checkbox" id="all" onclick="change();"> Nombre</th>
                    <th></th>
                </tr>
                @foreach($permisos as $item)
                @if($cambio==1)
                <tr>
                    <td><input type="checkbox" name="{{$item->id}}" value="{{$item->id}}"
                    @foreach ($permisos2 as $item2)
                        @if($item2->id_permiso==$item->id)
                        checked 
                        @endif
                    @endforeach
                    > {{$item->nombre}}</td>
                @php $cambio = 0; @endphp

                @else 
                    <td><input type="checkbox" name="{{$item->id}}" value="{{$item->id}}"
                    @foreach ($permisos2 as $item2)
                        @if($item2->id_permiso==$item->id)
                        checked 
                        @endif
                    @endforeach
                    > {{$item->nombre}}</td>
                </tr>

                @php $cambio = 1; @endphp

                @endif
                @endforeach
            </table>
            <button type="submit" class="btn btn-danger">Enviar</button>
        </form>
        <script>
            function seleccionar_todo(){
                for (i=0;i<document.f1.elements.length;i++)
                    if(document.f1.elements[i].type == "checkbox")
                        document.f1.elements[i].checked=1
            }

            function deseleccionar_todo(){
                for (i=0;i<document.f1.elements.length;i++)
                    if(document.f1.elements[i].type == "checkbox")
                        document.f1.elements[i].checked=0
            }

            function change(){
                if(document.getElementById('all').checked==true){
                    seleccionar_todo();
                }else{
                    deseleccionar_todo();
                }
            }
        </script>
    </x-slot>
</x-menu-grupos>
