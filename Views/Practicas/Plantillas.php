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
            <h5 class="card-header"><i class="fas fa-file-alt"></i> <strong>Plantillas Generadas (Texto)</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#nueva_practica"><i class="fas fa-plus-circle"></i> Nueva</button>
                                    <a href="<?php echo base_url(); ?>Practicas/Eliminado" class="btn btn-dark mb-2"><i class="fas fa-archive"></i> Inactivas</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La plantilla ya existe.</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registra.</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Plantilla registrada.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Plantilla modificado.</strong>
                                            </div>
                                        <?php } else if ($alert == "inactivo") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La plantilla fue inactivada.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
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
                                                    <a title="Editar" href="<?php echo base_url() ?>Practicas/Teditar?id=<?php echo $lista['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Practicas/Teliminar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline elim">
                                                        <button title="Inactivar" type="submit" class="btn btn-dark mb-2"><i class="fas fa-folder"></i></button>
                                                    </form>  
                                                    <?php if($lista['formato'] == ""){ ?> 
                                                        <?php }  elseif($lista['formato'] == "") { ?>
                                                        <?php }  else { ?>
                                                        <a title="Formato" href="<?php echo base_url(); ?>/Assets/archivos/practicas/<?php echo $lista['formato']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary mb-2"><i class="fa fa-file-pdf"></i></a>
                                                    <?php }?>
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
            <h5 class="card-header"><i class="fas fa-shopping-cart"></i> <strong>Plantillas Generadas (Materiales)</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a href="<?php echo base_url(); ?>Practicas/Mplantilla" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i> Nueva</a>
                                    <a href="<?php echo base_url(); ?>Practicas/Eliminado" class="btn btn-dark mb-2"><i class="fas fa-warehouse"></i> Inactivas</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existeM") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La plantilla ya existe.</strong>
                                            </div>
                                        <?php } else if ($alert == "errorM") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registra.</strong>
                                            </div>
                                        <?php } else if ($alert == "registradoM") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Plantilla registrada.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificadoM") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Plantilla modificado.</strong>
                                            </div>
                                        <?php } else if ($alert == "inactivoM") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La plantilla fue inactivada.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
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
                                                    <a title="Editar" href="<?php echo base_url() ?>Practicas/Mplantilla?id=<?php echo $materiales['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Practicas/Meliminar?id=<?php echo $materiales['id']; ?>" method="post" class="d-inline elim">
                                                        <button title="Inactivar" type="submit" class="btn btn-dark mb-2"><i class="fas fa-dolly"></i></button>
                                                    </form>  
                                                    <a title="Formato" href="<?php echo base_url(); ?>Practicas/ver?id=<?php echo $materiales['id']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary mb-2"><i class="fa fa-file-pdf"></i></a>
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

<div id="nueva_practica" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nueva Plantilla</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Practicas/insertar" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Práctica</label>
                        <textarea class="form-control" name="nombre" id="nombre" rows="1" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción de la Práctica</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="objetivos">Objetivos de la Práctica</label>
                        <textarea class="form-control" name="objetivos" id="objetivos" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="requisitos">Requisitos de la Práctica</label>
                        <textarea class="form-control" name="requisitos" id="requisitos" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivo">
                            <label class="custom-file-label" for="customFile"></label>
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