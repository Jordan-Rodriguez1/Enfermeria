<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 2){ ?> 
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
            <h5 class="card-header"><i class="fas fa-users-slash"></i> <strong>Usuarios Inactivos</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a href="<?php echo base_url(); ?>/Usuarios/Listar" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "eliminado") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>El usuario fue eliminado.</strong>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El usuario fue reingresado.</strong>
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
                                            <th>No. Trabajador</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
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
                                                <td><?php
                                                    if ($us['rol'] == 5) {
                                                        echo "Administrador";
                                                    } elseif ($us['rol'] == 4) {
                                                        echo "Gestor";
                                                    } elseif ($us['rol'] == 3) {
                                                        echo "Vendedor";
                                                    } elseif ($us['rol'] == 2) {
                                                        echo "Responsable";
                                                    } ?> </td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Usuarios/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline confirmar">
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-user"></i></button>
                                                    </form>
                                                    <form action="<?php echo base_url() ?>Usuarios/eliminarper?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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