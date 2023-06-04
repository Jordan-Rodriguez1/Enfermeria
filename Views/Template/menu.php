<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css" type="text/css">
    <title>Sistema Horarios</title>

    <!-- Bootstrap CSS-->

    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>Assets/img/horarios/logo.svg">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #669934;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url(); ?>Assets/img/horarios/logo.svg" alt="Bootstrap" width="35" height="35">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>Dashboard/Horarios">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>Materias/Listar">Materias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>Alumnos/ListarH">Alumnos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>Usuarios/ListarH">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>Maestros/Listar">Profesores</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url(); ?>Dashboard/Listar">Laboratorio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    