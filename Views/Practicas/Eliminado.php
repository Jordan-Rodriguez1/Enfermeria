<?php encabezado() ?>

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
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-archive"></i> <strong>Plantillas Inactivas (Texto)</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Practicas/Plantillas"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "eliminado") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>La plantilla fue eliminada.</strong>
                                            </div>
                                        <?php } elseif ($alert == "reingresar"){ ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La plantilla fue reingresada.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <tr>
                                                <td><?php echo $lista['id']; ?></td>
                                                <td><?php echo $lista['nombre']; ?></td>
                                                <td><?php echo $lista['descripcion']; ?></td>
                                                <td><?php echo $lista['fecha']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Practicas/Treingresar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline confirmar">
                                                        <button type="submit" class="btn btn-success mb-2"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                    <form action="<?php echo base_url() ?>Practicas/Teliminarper?id=<?php echo $lista['id']; ?>" method="post" class="d-inline elimper">
                                                        <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
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
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-warehouse"></i> <strong>Plantillas Inactivas (Materiales)</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a class="btn btn-primary mb-2" href="<?php echo base_url(); ?>Practicas/Plantillas"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "eliminadoM") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>La plantilla fue eliminada.</strong>
                                            </div>
                                        <?php } elseif ($alert == "reingresarM") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La plantilla fue reingresada.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="Table2">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Id</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data2 as $materiales) { ?>
                                            <tr>
                                                <td><?php echo $materiales['id']; ?></td>
                                                <td><?php echo $materiales['descripcion']; ?></td>
                                                <td><?php echo $materiales['fecha']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Practicas/Mreingresar?id=<?php echo $materiales['id']; ?>" method="post" class="d-inline confirmar">
                                                        <button type="submit" class="btn btn-success mb-2"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                    <form action="<?php echo base_url() ?>Practicas/Meliminarper?id=<?php echo $materiales['id']; ?>" method="post" class="d-inline elimper">
                                                        <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
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