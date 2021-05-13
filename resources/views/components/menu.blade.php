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

        <!-- Bootstrap core JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Código JS del Sidebar -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
</head>

<body>
        <div class="d-flex ml-4" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-danger border-right" id="sidebar-wrapper">
                <div class="sidebar-heading" style="color: white; font-size: 25px;">Administración</div>
                <div class="list-group list-group-flush">
                    <aside class="keep" style="color: white; text-align: center;">
                        <span class="material-icons align-middle" style="margin-top: 80px;">
                            home
                        </span> 
                        <span class="material-icons align-middle mt-4">
                            school
                        </span> 
                        <span class="material-icons align-middle mt-4">
                            admin_panel_settings
                        </span> 
                        <span class="material-icons align-middle mt-4">
                            report_problem
                        </span> 
                        <span class="material-icons align-middle mt-4">
                            face
                        </span> 
                        <span class="material-icons align-middle mt-4">
                            logout
                        </span> 
                    </aside>
                    <a class="list-group-item list-group-item-action bg-danger" style="color: white;" href="#!">
                        Bienvenido</a>
                    <a class="list-group-item list-group-item-action bg-danger" style="color: white;" href="#!">
                        Profesores</a>
                    <a class="list-group-item list-group-item-action bg-danger" style="color: white;" href="#!">
                        Administradores</a>
                    <a class="list-group-item list-group-item-action bg-danger" style="color: white;" href="#!">
                        Incidencias
                    </a>
                    <a href="{{route('alumnos.index')}}" class="list-group-item list-group-item-action bg-danger" style="color: white;" href="#!">
                        Alumnos
                    </a>
                    <a href="{{route('logout')}}" class="list-group-item list-group-item-action bg-danger" style="color: white;" href="#!">
                        Cerrar sesión</a>
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
                                <a class="nav-link" href="#!">
                                    <strong>José</strong> <br/>Profesor
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
        </div>
        
    </body>
</html>