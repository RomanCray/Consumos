<?php
session_start();

$nombreCompleto = $_SESSION['nombreCompleto'];
$ID_usuario = $_SESSION['ID_usuario'];
$us_imagen = $_SESSION['us_imagen'];

$page_ubi = $_GET['val_page'];

if (!$ID_usuario) {
    header('Location:../Templates/Login.php');
}

$partesN = explode(" ", $nombreCompleto);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Core plugin JavaScript-->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/jquery-easing/dist/jquery.easing.1.3.umd.min.js"></script>

    <!-- Iconos y complementos bootstrap -->
    <link href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" type="text/css">
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">    

    <!-- Tipo de fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../Complements/css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" style="color: #205375">
        <input hidden class="UsuarioAct" id="<?php echo $nombreCompleto;?>" value="<?php echo $ID_usuario;?>">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #205375;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../Content/home.php?val_page=home">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-heart-arrow"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $partesN[1]; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Familia
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="../Content/home.php?val_page=home">
                    <i class="bi bi-people-fill"></i>
                    <span>Gastos Familia</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Personal
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../Content/home.php?val_page=personal">
                    <i class="bi bi-person-fill"></i>
                    <span>Mis Gastos</span>
                </a>
                <a class="nav-link collapsed" href="../Content/home.php?val_page=personalFamilia">
                    <i class="bi bi-person-fill"></i>
                    <span>Mis Gastos Familia</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Producto
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../Content/productos.php?val_page=productosN">
                    <i class="bi bi-person-fill"></i>
                    <span>Añadir Producto</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="../../Conexion/logout.php">
                    <i class="bi bi-door-open-fill"></i>
                    <span>Cerrar Sesión</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="margin: 0 0.5rem">

            <nav class="navbar navbar-expand navbar-light bg-transparent  mb-2 static-top ">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color: white; background-color:#205375">
                    <i class="bi bi-layout-sidebar-inset"></i>
                </button>
                <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="bi bi-layout-sidebar-inset"></i>
                </button> -->
            </nav>
            