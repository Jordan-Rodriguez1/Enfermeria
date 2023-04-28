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
            <h5 class="card-header"><i class="fas fa-clipboard-list"></i> <strong>Salidas Generadas</strong></h5>
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
                                        if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La factura fue registrada con éxito.</strong>
                                            </div>
                                        <?php } else if ($alert == "noformato") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>La factura no pudo registrarse.</strong>
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
                                            <th>Generador</th>
                                            <th>Responsable</th>
                                            <th>Descripción</th>
                                            <th>Total</th> 
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <tr>
                                                <td><?php echo $lista['id']; ?></td>
                                                <td><?php echo $lista['id_generador']; ?></td>
                                                <td><?php echo $lista['id_responsable']; ?></td>
                                                <td><?php echo $lista['descripcion']; ?></td>
                                                <td><?php echo $lista['total']; ?></td>
                                                <td><?php echo $lista['fecha']; ?></td>
                                                <?php if($lista['estado'] == 0){ ?> 
                                                    <td class="table-danger">RECHAZADO</td>
                                                <?php }  else {if($lista['estado'] == 1){ ?>
                                                    <td class="table-warning">PENDIENTE</td>    
                                                <?php }  else { ?>
                                                    <td class="table-success">APROBADO</td>
                                                <?php } }?>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>Salidas/ver?id=<?php echo $lista['id']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-dark"><i class="fa fa-file-pdf"></i></a>
                                                    <?php if(($lista['formato'] == "" && $lista['id_generador'] == $_SESSION['nombre'] && $lista['estado'] == 2) || ($lista['formato'] == "" && $lista['id_responsable'] == $_SESSION['nombre'] && $lista['estado'] == 2)){ ?> 
                                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#cargar_formato" data-bs-id="<?php echo $lista['id']; ?>" onclick="idModal();"><i class="fas fa-upload"></i></button>
                                                        <?php }  elseif($lista['formato'] == "") { ?>
                                                        <?php }  else { ?>
                                                        <a href="<?php echo base_url(); ?>/Assets/archivos/salidas/<?php echo $lista['formato']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-dark"><i class="fa fa-file-image"></i></a>
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
    </section>
</div>
<div id="cargar_formato" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-upload"></i> Subir Factura</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Salidas/subirarchivo" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                        <input type="hidden" id="id" name="id">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivo">
                            <label class="custom-file-label" for="customFile"></label>
                            <label><br><strong>Nota:</strong> Una vez subida la factura no se podrá editar el archivo ingresado.</label>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-dark" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php pie() ?>