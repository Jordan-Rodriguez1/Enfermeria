<?php menu() ?>

<?php if($_SESSION['rol'] <= 1){ ?> 
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  elseif($_SESSION['rol'] <= 3) { ?>
<div class="page-content">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="container">
    <h5 style="margin: 30px 0 20px 0"><i class="fas fa-users"></i> <strong>Lista de Maestros</strong></h5>
    <div class="row">

        <div class="col-lg-8 mb-2">
            <a href="<?php echo base_url(); ?>Maestros/Listar" class="btn btn-primary mb-2"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
        </div>
        <div class="col-lg-4">
            <?php if (isset($_GET['msg'])) {
                $alert = $_GET['msg'];
                if ($alert == "eliminado") { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>El alumno fue eliminado.</strong>
                    </div>
                <?php } elseif ($alert == "Rtodo") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Todos los alumnos fueron reingresados.</strong>
                    </div>
                <?php } elseif ($alert == "Etodo") { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Todos los alumnos fueron eliminados.</strong>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>El alumno fue reingresado.</strong>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-5" id="Table">
            <thead class="thead-personality">
                <tr>
                    <th>Nombre</th>
                    <th>No. Cuenta</th>
                    <th>Correo</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data1 as $us) { ?>
                <?php if($_SESSION['rol'] >= $us['rol']){ ?>
                    <tr>
                        <td><?php echo $us['nombre']; ?></td>
                        <td><?php echo $us['usuario']; ?></td>
                        <td><?php echo $us['correo']; ?></td>
                        <td><?php echo $us['grado'];?></td>
                        <td>
                            <form action="<?php echo base_url() ?>Maestros/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline confirmar">
                                <button title="Reingresar" type="submit" class="btn btn-success mb-2"><i class="fas fa-user"></i></button>
                            </form>
                            <form action="<?php echo base_url() ?>Maestros/eliminarper?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                <button title="Eliminar" type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>

<?php fin() ?>