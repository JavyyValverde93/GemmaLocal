<?php

session_start();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala De Incidencias</title>    

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{asset('css/administracion/styles.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

        
</head>

<body>
        <div class="d-flex ml-4" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-danger border-right" id="sidebar-wrapper">
                <div class="sidebar-heading ml-4" style="color: white; font-size: 25px;">GEMMA</div>
                <div class="list-group list-group-flush">
                    <aside class="keep" style="color: white; text-align: center;">
                        <span class="material-icons align-middle" style="margin-top: 75px;">
                            <a class="text-white text-decoration-none" href="{{route('dashboard')}}" id="home">home</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                            <a class="text-white text-decoration-none" href="{{route('grupos.index')}}" id="group">group</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                            <a class="text-white text-decoration-none" href="{{route('matriculas.index')}}" id="task">task</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                            <a class="text-white text-decoration-none" href="{{route('prescripciones.index')}}" id="description">description</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                            <a class="text-white text-decoration-none" href="{{route('inventario.index')}}" id="inventory">inventory_2</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                            <a class="text-white text-decoration-none" href="{{route('alumnos.index')}}" id="face">person</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                            <a class="text-white text-decoration-none" href="{{route('profesores.index')}}" id="school">school</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                        <a class="text-white text-decoration-none" href="{{route('espacios.index')}}" id="room">room</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                        <a class="text-white text-decoration-none" href="{{route('facturaciones.index')}}" id="room">request_quote</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                        <a class="text-white text-decoration-none" href="{{route('comunicaciones.index')}}" id="room">email</a>
                        </span> 
                        <span class="material-icons align-middle mt-3">
                        <a class="text-white text-decoration-none" href="{{route('logs.index')}}" id="room">warning</a>
                        </span> 
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <span class="material-icons align-middle mt-3">
                                <a class="text-white text-decoration-none" href="Cerrar Sesión" id="logout">logout</a>
                            </span> 
                        </form>
                    </aside>
                    <div class="nav flex-column nav-pills ml-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a href="{{route('dashboard')}}"class="nav-link active bg-danger text-white text-decoration-none" id="v-pills-home-tab"  role="tab" aria-controls="v-pills-home" aria-selected="true">Administración</a>
                        <a href="{{route('grupos.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-profile-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false"> Grupos</a>
                        <a href="{{route('matriculas.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-messages-tab"  role="tab" aria-controls="v-pills-messages" aria-selected="false"> Matriculas</a>
                        <a href="{{route('prescripciones.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Prescripciones</a>
                        <a href="{{route('inventario.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Inventario</a>
                        <a href="{{route('alumnos.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-messages-tab" role="tab" aria-controls="v-pills-messages" aria-selected="false"> Alumnos</a>
                        <a href="{{route('profesores.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Profesores</a>
                        <a href="{{route('espacios.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Espacios</a>
                        <a href="{{route('facturaciones.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Facturaciones</a>
                        <a href="{{route('comunicaciones.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Comunicaciones</a>
                        <a href="{{route('logs.index')}}" class="nav-link bg-danger text-white text-decoration-none" id="v-pills-settings-tab" role="tab" aria-controls="v-pills-settings" aria-selected="false"> Logs</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="Cerrar Sesión" class="nav-link bg-danger text-white text-decoration-none" id="confirm"  role="tab" aria-controls="v-pills-settings" aria-selected="false" >
                                {{ __('Cerrar sesión') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contenido de la Página -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-outline-dark ml-4" id="menu-toggle">
                        <span class="material-icons align-middle">
                            reorder
                        </span>
                    </button>                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <strong>@if(Auth::user()!=null){{Auth::user()->name}} @endif</strong> <br/>Profesor
                                <span class="sr-only">(current)</span>
                            </li>
                        </ul>
                    </div>
                </nav>

                <style>
                    tr td i:last-child{
                        color: rgb(110, 110, 110);
                    }

                    tr td a{
                        color: blue;
                        text-decoration: underline;
                    }

                    .migaspan a{
                        color: #dc3545; /* blue #007eb0 */
                        text-decoration: underline;
                        margin: 0 5px;
                    }
                    
                    
                    .table-striped tbody tr:nth-of-type(odd){
                    background-color: rgb(237,245,245);
                    }
                    .table-hover tbody tr:hover{
                    background-color: #ddc7c9;
                    color: rgb(112,24,78);
                    }
                    .thead-green{
                    background-color: rgb(0, 99, 71);
                    color: white;
                    }

                </style>

                <div class="container ml-3">
                    <x-alert-message></x-alert-message>
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{ $slot }}
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Código JS del Sidebar -->
        <script>
         
			
			$("#confirm").click(function(){
  				var bool=confirm("¿Seguro que desea cerrar la sesión?");
  				if(bool){
					event.preventDefault();
                    this.closest('form').submit();
  				}else{
					event.preventDefault();			
				}
			});
			
			$("#logout").click(function(){
  				var bool=confirm("¿Seguro que desea cerrar la sesión?");
  				if(bool){
					event.preventDefault();
                    this.closest('form').submit();
  				}else{
					event.preventDefault();			
				}
			});
			
            $("#menu-toggle").click(function (e){
                let menu = localStorage.getItem("menu");
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");

                if(menu == undefined || menu != 1){
                    localStorage.setItem("menu",1);

                }else if (menu == 1){
                    localStorage.setItem("menu",0);
                    $("#wrapper").removeClass("toggled");
                }
            });


            window.onload = menu
            function menu(){
                let menu = localStorage.getItem("menu");
                if(menu == undefined || menu != 1){
                    $("#wrapper").removeClass("toggled");
                }else if(menu == 1){
                    $("#wrapper").toggleClass("toggled");
                }
            }

            function disableButton(form) {
                var btn = form.lastElementChild;
                btn.disabled = true;
                btn.innerText = 'Enviando...'
            }
			
        </script>
    </body>
</html>