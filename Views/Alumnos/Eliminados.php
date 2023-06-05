<?php encabezado() ?>
<?php if($_SESSION['rol'] <= 3){ ?> 
    <?php eror403() ?>
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-users-slash"></i> <strong>Alumnos Inactivos</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a href="<?php echo base_url(); ?>Alumnos/Listar" class="btn btn-primary mb-2"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                    <form action="<?php echo base_url() ?>Alumnos/Rtodo" method="post" class="d-inline Rtodo">
                                        <button type="submit" class="btn btn-success mb-2"><i class="fas fa-people-arrows"></i> Reingresar todo</button>
                                    </form> 
                                    <form action="<?php echo base_url() ?>Alumnos/Etodo" method="post" class="d-inline Etodo">
                                        <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-dumpster"></i> Eliminar Todo</button>
                                    </form> 
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
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>No. Cuenta</th>
                                            <th>Correo</th>
                                            <th>Grado y Grupo</th>
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
                                                <td>
                                                    <form action="<?php echo base_url() ?>Alumnos/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline confirmar">
                                                        <button title="Reingresar" type="submit" class="btn btn-success mb-2"><i class="fas fa-user"></i></button>
                                                    </form>
                                                    <form action="<?php echo base_url() ?>Alumnos/eliminarper?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                                        <button title="Eliminar" type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }} ?>
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
<?php } ?>

<?php pie() ?>