<?php
if (empty($_SESSION['active'])) {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de Administración</title>
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css">
    <script src="../assets/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="blue" data-image="../assets/img/sidebar.jpg">
            <div class="logo bg-primary"><a href="./" class="simple-text logo-normal">
                    Control y registro
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="profesores.php">
                            <i class="fas fa-user mr-2 fa-2x"></i>
                            <p> Profesores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="sesion_deportiva.php">
                            <i class=" fas fa-list mr-2 fa-2x"></i>
                            <p> Sesión deportiva</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="registrar_deportista.php">
                            <i class=" fas fa-users mr-2 fa-2x"></i>
                            <p> Registrar Deportista</p>
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="info_deportista.php">
                            <i class=" fas fa-tags mr-2 fa-2x"></i>
                            <p> Información del deportista</p>
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="pagos.php">
                            <i class=" fas fa-hospital mr-2 fa-2x"></i>
                            <p> Pagos</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="informacion.php">
                            <i class="fas fa-cogs mr-2 fa-2x"></i>
                            <p> Info-Ángeles</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Club deportivo Ángeles</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    <p class="d-lg-none d-md-block">
                                        Cuenta
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#nuevo_pass">Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content bg">
                <div class="container-fluid">