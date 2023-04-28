<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assets/img/icon.png">
    <title>Enfermería UCOL | Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
  </head>

  <body>
    <div style="background-image: url(Assets/img/fondo.png); background-repeat: no-repeat; background-size: cover; min-height: 100vh; background-position: center">
      <div class="container">
        <form id="user" action="<?php echo base_url(); ?>Alumnos/login" class="user" method="POST" autocomplete="off">
          <p><img src="Assets/img/logo2.png"></p>
          <p>Bienvenido Alumno</p><br>
          <input type="email"  name="usuario" placeholder="Correo" id="usuario"  required><br>
          <input type="password" name="clave" placeholder="Contraseña"  id="clave" required><br>
            <?php if (isset($_GET['msg'])) { ?>
              <div class="alert alert-danger" role="alert">
                <strong>Usuario o Contraseña Incorrecta</strong>
              </div>
            <?php } ?>
          <input type="submit" value="Entrar"/><br>
          <a href="Login/recuperar">¿Olvidaste tu contraseña?</a><br><br>
          <a href="Login/loginprof">Soy Administrador</a>
        </form>     
      </div>
    </div>
  </body>
</html>