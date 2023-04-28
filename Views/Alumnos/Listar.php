<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 1){ ?> 
<div class="page-content bg-light">
    <section>
        <div class="container-fluid container-fluidwelcome"  >
            <div class="row">
                <div class="col-lg-4 mt-2">
                </div>
                <div class="col-lg-4 mt-2">
                <img src="../assets/img/unicornio.png" style="height: 400px; ">
                <h2 class="h5 no-margin-bottom" style="text-align: center">Error: No tienes autorización para ingresar a esta página</h2>
                </div>
                <div class="col-lg-4 mt-2">
                </div>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-users"></i> <strong>Alumnos Registrados</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <a href="<?php echo base_url(); ?>Alumnos/eliminados" class="btn btn-dark"><i class="fas fa-users-slash"></i> Inactivos</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El usuario ya existe.</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registra.</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Usuario registrado.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Usuario modificado.</strong>
                                            </div>
                                        <?php } else if ($alert == "inactivo") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El usuario fue inactivado.</strong>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Las contraseñas no coinciden.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>No. Cuenta</th>
                                            <th>Correo</th>
                                            <th>Grado y Grupo</th>
                                            <th>Asistencias</th>
                                            <th>Faltas</th>
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
                                                <td><?php echo $us['grado'], 'º', $us['grupo'];?></td>
                                                <?php if($us['asistencias'] <= 2){ ?> 
                                                <td class="table-danger"><?php echo $us['asistencias']; ?></td>
                                                <?php }  else {if($us['asistencias'] <= 5){ ?>
                                                <td class="table-warning"><?php echo $us['asistencias']; ?></td>    
                                                <?php }  else { ?>
                                                <td class="table-success"><?php echo $us['asistencias']; ?></td>
                                                <?php } }?>
                                                <?php if($us['faltas'] <= 2){ ?> 
                                                <td class="table-danger"><?php echo $us['faltas']; ?></td>
                                                <?php }  else {if($us['faltas'] <= 5){ ?>
                                                <td class="table-warning"><?php echo $us['faltas']; ?></td>    
                                                <?php }  else { ?>
                                                <td class="table-success"><?php echo $us['faltas']; ?></td>
                                                <?php } }?>
                                                <td>
                                                    <a href="<?php echo base_url() ?>Alumnos/editar?id=<?php echo $us['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Alumnos/eliminar?id=<?php echo $us['id']; ?>" method="post" class="d-inline elim">
                                                        <button type="submit" class="btn btn-dark"><i class="fas fa-user-slash"></i></button>
                                                    </form>              
                                                </td>
                                            </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            <form method="post" action="<?php echo base_url(); ?>Alumnos/insertar" autocomplete="off">
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
                                <input id="usuario" class="form-control" type="number" name="usuario" placeholder="No. Trabajador" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="confirmar">Confirma Contraseña</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña" required>
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

<?php pie() ?>