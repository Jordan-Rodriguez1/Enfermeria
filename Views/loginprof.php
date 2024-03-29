<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Assets/img/icon.png">
    <title>Enfermería UCOL | Login Administrativo</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Assets/css/main.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>

  <body>
    <div style="background-image: url(../Assets/img/fondo.png); background-repeat: no-repeat; background-size: cover; min-height: 100vh; background-position: center">
      <div class="container">
        <form id="user" action="<?php echo base_url(); ?>Usuarios/login"class="user" method="POST" autocomplete="off">
          <p><img src="../Assets/img/logo2.png"></p>
          <p>Bienvenido Administrador</p><br>
          <input type="email"  name="usuario" placeholder="Correo" id="usuario"  required><br>
          <input type="password" name="clave" placeholder="Contraseña"  id="clave" required><br>
              <?php if (isset($_GET['msg'])) {
              $alert = $_GET['msg'];
              if ($alert == "capcha") { ?> 
                  <div class="alert alert-success" role="alert">
                      <strong>Valida el Capcha.</strong>
                  </div>
              <?php } else { ?>  
                <div class="alert alert-danger" role="alert">
                  <strong>Usuario o Contraseña Incorrecta</strong>
                </div>
              <?php } } ?>
          <br>
          <!-- <div class="g-recaptcha" data-sitekey="6LcsES8mAAAAAJno5nv0VXeNp0LZ5l3otHIfNQjj"></div> captcha -->
          <input type="submit" value="Entrar"/><br>
          <a href="recuperarprof">¿Olvidaste tu contraseña?</a><br><br>
          <a href="../">Soy Alumno</a>
        </form>     
      </div>
    </div>
  </body>
</html>