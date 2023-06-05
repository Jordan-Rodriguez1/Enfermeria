<?php if($_SESSION['rol'] <= 1){ ?> 
    <?php eror403() ?>
<?php }  else { ?>
    <?php encabezado() ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-check-double"></i> <strong>Movimientos Por Validar</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "aprobado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Movimiento aprobado exitosamente.</strong>
                                            </div>
                                        <?php } else if ($alert == "denegado") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Movimiento rechazado exitosamente.</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>Error en el movimiento.</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>ID</th>
                                            <th>Generador</th>
                                            <th>Descripción</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <?php if ($_SESSION['rol'] >= 4) { ?>
                                                <tr>
                                                    <td><?php echo $lista['id']; ?></td>
                                                    <td><?php echo $lista['id_generador']; ?></td>
                                                    <td><?php echo $lista['descripcion']; ?></td>
                                                    <td><?php echo $lista['total']; ?></td>
                                                    <td><?php echo $lista['fecha']; ?></td>         
                                                    <td>
                                                        <?php if ($_SESSION['id'] == $lista['idresp']) { ?>
                                                            <form action="<?php echo base_url() ?>Movimientos/aprobar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline aprobado">
                                                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                                            </form>
                                                            <form action="<?php echo base_url() ?>Movimientos/rechazar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline rechazo">
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                                            </form>
                                                            <a href="<?php echo base_url(); ?>Movimientos/ver?id=<?php echo $lista['id']; ?>&responsable=<?php echo $lista['id_responsable']; ?>&generador=<?php echo $lista['id_generador']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-dark"><i class="fa fa-file-pdf"></i></a>
                                                        <?php } else {?>
                                                            <p>Debe ser validado por <?php echo $lista['id_responsable']; ?></p>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } else {?>
                                                <?php if ($_SESSION['id'] == $lista['idresp']) { ?>
                                                    <tr>
                                                        <td><?php echo $lista['id']; ?></td>
                                                        <td><?php echo $lista['id_generador']; ?></td>
                                                        <td><?php echo $lista['descripcion']; ?></td>
                                                        <td><?php echo $lista['total']; ?></td>
                                                        <td><?php echo $lista['fecha']; ?></td>         
                                                        <td>
                                                            <form action="<?php echo base_url() ?>Movimientos/aprobar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline aprobado">
                                                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                                            </form>
                                                            <form action="<?php echo base_url() ?>Movimientos/rechazar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline rechazo">
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                                            </form>
                                                            <a href="<?php echo base_url(); ?>Movimientos/ver?id=<?php echo $lista['id']; ?>&responsable=<?php echo $lista['id_responsable']; ?>&generador=<?php echo $lista['id_generador']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-dark"><i class="fa fa-file-pdf"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
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