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
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="container">
    <h5 style="margin: 30px 0 20px 0"><i class="fas fa-users"></i> <strong>Lista de Materias</strong></h5>
    <div class="row">
        <div class="col-lg-8 mb-2">
            <?php if($_SESSION['rol'] >= 4){ ?> 
                <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                <a href="<?php echo base_url(); ?>Materias/eliminados" class="btn btn-dark mb-2"><i class="fas fa-users-slash"></i> Inactivos</a>
            <?php } ?> 
        </div>
        <div class="col-lg-4">
            <?php if (isset($_GET['msg'])) {
                $alert = $_GET['msg'];
                if ($alert == "existe") { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong>El alumno ya existe.</strong>
                    </div>
                <?php } else if ($alert == "error") { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Error al registrar.</strong>
                    </div>
                <?php } else if ($alert == "registrado") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Alumno registrado.</strong>
                    </div>
                <?php } else if ($alert == "rest") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>La contraseña del alumno se restableció.</strong>
                    </div>
                <?php } else if ($alert == "modificado") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Alumno modificado.</strong>
                    </div>
                <?php } else if ($alert == "subido") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Grado aumentado a todos los alumnos.</strong>
                    </div>
                <?php } else if ($alert == "cargado") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong><?php echo $_GET['a'];?> alumnos cargados.</strong> <br>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $_GET['e'];?> errores.</strong> <br>
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <strong><?php echo $_GET['x'];?> alumnos ya existen.</strong> <br>
                    </div>
                <?php } else if ($alert == "inactivo") { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>El usuario fue inactivado.</strong>
                    </div>
                <?php }
            } ?>
        </div>
    </div>

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
                        <a title="Editar" href="<?php echo base_url() ?>Materias/editar?id=<?php echo $us['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                        <form action="<?php echo base_url() ?>Materias/eliminar?id=<?php echo $us['id']; ?>" method="post" class="d-inline elim">
                            <button title="Inactivar" type="submit" class="btn btn-dark mb-2"><i class="fas fa-user-slash"></i></button>
                        </form>     
                    </td>
                </tr>
            <?php } }?>
        </tbody>
    </table>
</div>
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nuevo Alumno</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Materias/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="usuario">No. Cuenta</label>
                                <input id="usuario" class="form-control" type="number" min="10000000" max="99999999" name="usuario" placeholder="No. Cuenta" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="grupo">Grupo</label>
                                <input id="grupo" class="form-control" type="text" name="grupo" maxlength="1" placeholder="Grupo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>


<?php fin() ?>