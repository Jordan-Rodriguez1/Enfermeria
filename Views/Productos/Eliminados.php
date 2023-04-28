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
            <h5 class="card-header"><i class="fas fa-box"></i> <strong>Productos Inactivos</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Productos/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "eliminado") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>El producto fue eliminado.</strong>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El producto fue reingresado.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Inventario</th>
                                            <th>Costo</th>
                                            <th>Categoría</th>
                                            <th>Proveedor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $pro) { ?>
                                            <tr>
                                                <td><?php echo $pro['codigo']; ?></td>
                                                <td><?php echo $pro['nombre']; ?></td>
                                                <td><?php echo $pro['cantidad']; ?></td>
                                                <td><?php echo $pro['precio']; ?></td>
                                                <td><?php echo $pro['categoria']; ?></td>
                                                <td><?php echo $pro['proveedor']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Productos/reingresar?id=<?php echo $pro['id']; ?>" method="post" class="d-inline confirmar">
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                    <form action="<?php echo base_url() ?>Productos/eliminarper?id=<?php echo $pro['id']; ?>" method="post" class="d-inline elimper">
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
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