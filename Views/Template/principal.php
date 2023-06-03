<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="robots" content="all,follow">
            <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css" type="text/css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
            
            <title>Inicio Horarios</title>
            <script>
                if(!document.cookie){
                    window.location.replace("login.php");
                }
            </script>
            <!-- Favicon-->
            <link rel="icon" href="<?php echo base_url(); ?>Assets/img/horarios/logo.svg">
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #669934;">
                <div class="container-fluid">
                    <div class="navbar-brand" href="<?php echo base_url(); ?>Dashboard/Horarios">
                        <img src="<?php echo base_url(); ?>Assets/img/horarios/logo.svg" alt="Bootstrap" width="60" height="60">
                        <b style="font-family:Arial, Helvetica, sans-serif; font-size:25px; margin-left: 10px;">Control escolar</b>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>