<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enfermería UCOL | Administración </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
    <!-- Favicon-->
    <link rel="icon" href="../Assets/img/icon.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="main-header">
        <nav class="sb-topnav navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                    <!-- Navbar Header-->
                    <?php if ($_SESSION['rol'] != 1) {?>
                        <a href="<?php echo base_url(); ?>Dashboard/Listar" class="navbar-brand">
                            <img src="../Assets/img/logo2.png" style="height: 60px;">
                        </a>
                        <!-- Sidebar Toggle Btn-->
                        <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
                    <?php } else {?>
                        <a href="<?php echo base_url(); ?>Dashboard/Alumnos" class="navbar-brand">
                            <img src="../Assets/img/logo2.png" style="height: 60px;">
                        </a>
                    <?php }?>
                </div>

                <div class="right-menu list-inline no-margin-bottom">
                    <?php if (isset($_GET['msg'])) {
                        $alert = $_GET['msg'];
                        if ($alert == "cambio") { ?> 
                            <div class="alert alert-success" role="alert">
                                <strong>Contraseña Cambiada.</strong>
                            </div>
                        <?php } else if ($alert == "errorh") { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error. La contraseña actual es incorrecta.</strong>
                            </div>
                        <?php } else if ($alert == "imagen") { ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Imagen Cambiada. Cierre sesión para ver los cambios reflejados.</strong>
                            </div>
                        <?php } else if ($alert == "noimagen") { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error. No se pudo cambiar la imagen.</strong>
                            </div>
                        <?php } else if ($alert == "formato") { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error. Formato no valido.</strong>
                            </div>
                        <?php } else if ($alert == "noigual"){ ?>
                            <div class="alert alert-warning" role="alert">
                                <strong>Error. Las nuevas contraseñas no coinciden.</strong>
                            </div>
                        <?php }
                    } ?>
                </div>

                <div class="list-inline-item">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <?php if ($_SESSION['rol'] != 1) {?>
                                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>/Assets/img/perfiles/<?php echo $_SESSION['perfil']; ?>" alt="..." class="img-fluid rounded-circle" style="height: 50px;"><span class="text-primary"><h4 style="color: #c2258e;">Hola  <strong><b><?php echo $_SESSION['nombre']; ?></b></strong></h4></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style=" position: absolute;">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPass">Cambiar Contraseña</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPic">Cambiar Foto</a>
                            <?php } else {?>
                                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>/Assets/img/perfilesalumnos/<?php echo $_SESSION['perfil']; ?>" alt="..." class="img-fluid rounded-circle" style="height: 50px;"><span class="text-primary"><h4 style="color: #c2258e;">Hola  <strong><b><?php echo $_SESSION['nombre']; ?></b></strong></h4></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style=" position: absolute;">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPassA">Cambiar Contraseña</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPicA">Cambiar Foto</a>
                            <?php }?> 
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Cerrar Sessión</a>
                                </div>
                        </li>
                    </ul>
                </div> 
            </div>                               
        <!-- Navbar-->
        </nav>
    </header>

    <div class="d-flex align-items-stretch">
        <?php if ($_SESSION['rol'] != 1) {?>
            <!-- Sidebar Navigation-->
            <nav id="sidebar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center p-1">
                    <div class="title" style="padding: 10px 0 0 40px;">
                        <h5 class="h5"><?php if ($_SESSION['rol'] == 5) {
                                                echo "Administrador";
                                            } elseif ($_SESSION['rol'] == 4) {
                                                echo "Gestor";
                                            } elseif ($_SESSION['rol'] == 3) {
                                                echo "Vendedor";
                                            } elseif ($_SESSION['rol'] == 2) {
                                                echo "Responsable";
                                            } ?></h5>
                    </div>
                </div>
                <ul class="list-unstyled" style="margin-bottom: 5rem;">
                    <li><a href="<?php echo base_url(); ?>Dashboard/Listar"> <i class="fas fa-home"></i> <strong class="text-black"> Home </strong></a></li> 

                    <?php if($_SESSION['rol'] > 1){ ?>
                        <li><a href="#DropdownCotizaciones" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-folder-open"></i> <strong class="text-black"> Prácticas </strong></a>
                            <ul id="DropdownCotizaciones" class="collapse list-unstyled ">
                                <li><a href="<?php echo base_url(); ?>Practicas/Plantillas"><i class="fas fa-pen-alt"></i> Plantillas </a></li>
                                <li><a href="<?php echo base_url(); ?>Practicas/Practicas"><i class="fas fa-book"></i> Prácticas </a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>Movimientos/Listar"><i class="fas fa-check-double"></i> <strong class="text-black"> Movimientos </strong></a></li>
                        <li><a href="<?php echo base_url(); ?>Alumnos/Listar"> <i class="fas fa-user"></i> <strong class="text-black"> Alumnos </strong></a></li>
                    <?php } ?>

                    <?php if($_SESSION['rol'] > 2){ ?>
		    		    <li><a href="#dropdownCompras" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-cart-plus"></i> <strong class="text-black"> Entradas</strong></a>
                            <ul id="dropdownCompras" class="collapse list-unstyled ">
                                <li><a href="<?php echo base_url(); ?>Entradas/Listar"><i class="fas fa-shopping-cart"></i> Nueva Entrada</a></li>
                                <li><a href="<?php echo base_url(); ?>Entradas/lista"><i class="fas fa-clipboard-list"></i> Consulta Entradas</a></li>
                            </ul>
                        </li>
                        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-cart-arrow-down"></i> <strong class="text-black"> Salidas </strong></a>
                            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                                <li><a href="<?php echo base_url(); ?>Salidas/Listar"><i class="fas fa-shopping-cart"></i> Nueva Salida </a></li>
                                <li><a href="<?php echo base_url(); ?>Salidas/lista"><i class="fas fa-clipboard-list"></i> Consulta Salidas </a></li>
                            </ul>
                        </li>
                        <li><a href="#DropdownProductos" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-boxes"></i> <strong class="text-black"> Materiales </strong></a>
                            <ul id="DropdownProductos" class="collapse list-unstyled ">
                                <li><a href="<?php echo base_url(); ?>Productos/Listar"><i class="fas fa-box-open"></i> Inventario </a></li>
                                <li><a href="<?php echo base_url(); ?>Productos/Categorias"><i class="fas fa-tags"></i> Categorías </a></li>
                                <li><a href="<?php echo base_url(); ?>Productos/Proveedores"><i class="fas fa-truck"></i> Proveedores </a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>Usuarios/Listar"> <i class="fas fa-users"></i> <strong class="text-black"> Usuarios </strong></a></li>
                    <?php } ?>

                    <?php if($_SESSION['rol'] > 4){ ?>
                        <li><a href="#DropdownReportes" aria-expanded="false" data-toggle="collapse"><i class="fas fa-file-signature"></i> <strong class="text-black"> Reportes </strong></a>
                            <ul id="DropdownReportes" class="collapse list-unstyled ">
                                <li><a href="<?php echo base_url(); ?>Reportes/Alumnos"><i class="fas fa-user"></i> Alumnos </a></li>
                                <li><a href="<?php echo base_url(); ?>Reportes/Practicas"><i class="fas fa-book"></i> Prácticas </a></li>
                                <li><a href="<?php echo base_url(); ?>Reportes/Materiales"><i class="fas fa-boxes"></i> Materiales </a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>Configuracion/Listar"> <i class="fas fa-cog"></i> <strong class="text-black"> Configuración </strong></a></li>
                    <?php } ?>

                    <li><a href="<?php echo base_url(); ?>Dashboard/Ayuda"> <i class="fas fa-info-circle"></i> <strong class="text-black"> Ayuda </strong></a></li> 
                </ul>
            </nav>
        <?php } ?>